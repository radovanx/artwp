<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arttrip
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Always shows a header, even in smaller screens. -->
<!-- Uses a header that scrolls with the text, rather than staying
  locked at the top -->
<!-- Always shows a header, even in smaller screens. -->
<div id="page" class="mdl-layout mdl-js-layout mdl-layout--fixed-header <?php if(is_home()){echo 'demo-blog';}?>">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <a href="#" class="mdl-layout-title"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="art & trip"></a>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
       <!-- Navigation. We hide it in small screens. -->
 	  <?php
    $args = array(
          'theme_location' => 'primary',
          'container'       => 'nav',
          'items_wrap' => '%3$s',
          'container_class' => 'mdl-navigation mdl-layout--large-screen-only',
      'walker' => new MDLWP_Nav_Walker()
    );
    if (has_nav_menu('primary')) {
           wp_nav_menu($args);
        }
    ?>
    </div>
  </header>
  <div class="mdl-layout__drawer">
  <span class="mdl-layout-title"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="art & trip"></span>
  <?php
    $args = array(
          'theme_location' => 'primary',
          'container'       => 'nav',
          'items_wrap' => '%3$s',
          'container_class' => 'mdl-navigation',
      'walker' => new MDLWP_Nav_Walker()
    );
    if (has_nav_menu('primary')) {
           wp_nav_menu($args);
        }
  ?>
  </div>