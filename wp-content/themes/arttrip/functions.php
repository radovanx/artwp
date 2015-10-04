<?php
/**
 * arttrip functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package arttrip
 */

if ( ! function_exists( 'arttrip_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arttrip_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on arttrip, use a find and replace
	 * to change 'arttrip' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'arttrip', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'arttrip' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

}
endif; // arttrip_setup
add_action( 'after_setup_theme', 'arttrip_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function arttrip_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'arttrip_content_width', 640 );
}
add_action( 'after_setup_theme', 'arttrip_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function arttrip_scripts() {

	wp_enqueue_style( 'mdlwp-mdl-icons', '//fonts.googleapis.com/icon?family=Material+Icons',  false);
	wp_enqueue_style( 'mdlwp-mdl-roboto', '//fonts.googleapis.com/css?family=Noto+Sans:400,700', false );
	wp_enqueue_style( 'arttrip-style', get_stylesheet_uri(),  false );

	wp_enqueue_script( 'arttrip-navigation', get_template_directory_uri() . '/js/script.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arttrip_scripts' );


// Remove unnecessary funcions in wp_head().
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// Remove replytocom.
function add_nofollow($link, $args, $comment, $post){
  return preg_replace( '/href=\'(.*(\?|&)replytocom=(\d+)#respond)/', 'href=\'#comment-$3', $link );
}
add_filter( 'comment_reply_link', 'add_nofollow', 420, 4 );


// Add class to more link.
function modify_read_more_link() {
  return '<a class="more-link mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" href="' . get_permalink() . '">Read More <i class="material-icons mdl-color-text--white" role="presentation">arrow_forward</i></a>';
}

add_filter( 'the_content_more_link', 'modify_read_more_link' );

// Custom comment submit button.
function awesome_comment_form_submit_button( $button ) {
  $button =
    '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" name="submit" type="submit">
      <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
     </button>' .
    get_comment_id_fields();
  return $button;
}

add_filter( 'comment_form_submit_button', 'awesome_comment_form_submit_button' );

// The comments list.
function mytheme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
  	$tag = 'div';
  	$add_below = 'comment';
  } else {
  	$tag = 'li';
  	$add_below = 'div-comment';
  } ?>
  <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body comment mdl-color-text--grey-700">
  <?php endif; ?>
  <header class="comment__header">
    <?php echo get_avatar( $comment, 88 ); ?>
    <div class="comment__author">
      <?php printf( __( '<strong>%s</strong>', 'iscream' ), get_comment_author_link() ); ?>
      <span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
    </div>
  </header>
  <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'iscream' ); ?></em>
    <br />
  <?php endif; ?>
     <div class="comment__text">
    <?php comment_text(); ?>
  </div>
  <div class="reply">
    <?php $reply_args = array(
      'reply_text' => '
        <nav class="comment__actions">
         <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
           <i class="material-icons" role="presentation">reply</i>
           <span class="visuallyhidden">reply comment</span>
         </button>
       </nav>
     ');

    comment_reply_link( array_merge( $reply_args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  </div>

<?php }

// Add @ reply.
function comment_add_at( $comment_text, $comment = '') {
  if ( $comment->comment_parent > 0) {
    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }

  return $comment_text;
}

add_filter( 'comment_text' , 'comment_add_at', 20, 2 );





class MDLWP_Nav_Walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' is-active';

		$class_names = $class_names ? ' class="mdl-navigation__link ' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= $class_names;

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}


	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "\n";
	}
}



/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
//require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';



