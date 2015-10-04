<?php
/**
 * The template part for displaying the main navigation
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

?>

<div class="mdl-layout__header-row">
  <!-- Title -->
  <span class="mdl-layout-title"><img src="/images/logo.png" alt="art & trip"></span>
  <!-- Add spacer, to align navigation to the right -->
  <div class="mdl-layout-spacer"></div>

	 

  
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
