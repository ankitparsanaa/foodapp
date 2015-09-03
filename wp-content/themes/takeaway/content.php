  <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>

    <div class="featured-post">

      <?php _e( 'Featured post', 'takeaway' ); ?>

    </div>

  <?php endif; ?>
    

  <?php if ( is_search() ) : // Only display Excerpts for Search ?>

    <div class="entry-summary">

      <?php the_excerpt(); ?>

    </div><!-- .entry-summary -->
    
      <?php else : ?>

        <div class="entry-content">

          <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'takeaway' ) ); ?>
          
          <?php //s wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'takeaway' ), 'after' => '</div>' ) ); ?>
        
        </div><!-- .entry-content -->
  
  <?php endif; ?>