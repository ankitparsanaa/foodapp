	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <header><?php _e( 'Link', 'takeaway' ); ?></header>
	    <div class="entry-content">
	      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'takeaway' ) ); ?>
	    </div><!-- .entry-content -->

	    <footer class="entry-meta">
	      <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'takeaway' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_time(get_option('date_format')); ?></a>
	      
	      <?php edit_post_link( __( 'Edit', 'takeaway' ), '<span class="edit-link">', '</span>' ); ?>
	    </footer><!-- .entry-meta -->
	</article><!-- #post -->
