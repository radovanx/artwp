<?php get_header(); ?>

    <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid">
		<?php if ( have_posts() ) : ?>
			<?php $counter = 0;/* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
 
			<?php			 // Gets the uploaded featured image
  		$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  		// Checks and returns the featured image
  		$bg = (!empty( $featured_img ) ? "background-image: url('". $featured_img[0] ."');" : '');
		?>
 


				<?php if($counter == 0): ?>

		 <div class="mdl-card coffee-pic mdl-cell mdl-cell--8-col">
			<header class="entry-header mdl-card__media mdl-color-text--grey-50" <?php echo $bg; ?>>
				<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?> 
			</header><!-- .entry-header -->
			<div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
				<?php
		    	 $category = get_the_category();
			    foreach ($category as $cate){
			        $cat_link = get_category_link($cate->term_id);
			        $html  = "<strong><a href='{$cat_link}' title='{$cate->name}' class='mdl-button mdl-js-button mdl-js-ripple-effect'>";
			        $html .= "{$cate->name}</a></strong>";
			    }
			    echo $html;
		  		?>
                <span>2 days ago</span>
              </div>
            </div>
          </div>
          <div class="mdl-card something-else mdl-cell mdl-cell--8-col mdl-cell--4-col-desktop">
            <div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">
              <img src="images/logo.png">
            </div>
            <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
              <div>
                <strong>The Newist</strong>
              </div>
            </div>
          </div>
      <?php else: ?>

          <div class="mdl-card on-the-road-again mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3><a href="entry.html">On the road again</a></h3>
            </div>
            <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
 
		<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'arttrip' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php arttrip_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	           </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
                <strong>The Newist</strong>
                <span>2 days ago</span>
              </div>
            </div>
          </div>

      <?php endif; ?>
 

          	<?php $counter++; ?>
 
		<?php endwhile; ?>
 

          <nav class="demo-nav mdl-cell mdl-cell--12-col">
            <div class="section-spacer"></div>
            <a href="entry.html" class="demo-nav__button" title="show more">
              More
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_forward</i>
              </button>
            </a>
          </nav>
        </div>
        <footer class="mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
              <span class="visuallyhidden">Twitter</span>
            </button>
            <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
              <span class="visuallyhidden">Facebook</span>
            </button>
            <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
              <span class="visuallyhidden">Google Plus</span>
            </button>
          </div>
          <div class="mdl-mini-footer--right-section">
            <button class="mdl-mini-footer--social-btn social-btn__share">
              <i class="material-icons" role="presentation">share</i>
              <span class="visuallyhidden">share</span>
            </button>
          </div>
        </footer>
      </main>
      <div class="mdl-layout__obfuscator"></div>
    </div>


    </div>

	
			<?php the_posts_navigation(); ?>
 
		<?php endif; ?>
		 
	</div><!-- #primary -->
	<?php get_footer(); ?>