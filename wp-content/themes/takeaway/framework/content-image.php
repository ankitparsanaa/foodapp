
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'takeaway' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			          <h5><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h5>


			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'takeaway' ) . '</span>', __( '1 Reply', 'takeaway' ), __( '% Replies', 'takeaway' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'takeaway' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
