
			<?php if( $counter == 0 ): ?>

		 <div class="mdl-card coffee-pic mdl-cell mdl-cell--8-col">
			<header class="entry-header mdl-card__media mdl-color-text--grey-50" style="background-image: url("<?php echo $bg; ?>")">
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