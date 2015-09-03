  <?php get_header(); ?>

    <div class="page-content">

      <div class="heading">

        <h1><?php _e('Page not found!', 'takeaway'); ?></h1>

      </div>
      <!-- end .heading -->

      <div class="text-center error-page">

        <div class="container">

          <div class="row">

            <div class="col-md-12">

              <h4>
                <?php _e( 'We couldn&rsquo;t find what you were looking for. Try searching instead' , 'takeaway' ); ?>
              </h4>

              <div class="frown">

                <i class="fa fa-frown-o fa-5x"></i>  
                
              </div>
              
              <?php get_search_form( ); ?>

            </div>

          </div> <!-- end .row -->

        </div> <!-- end .container -->
      
      </div> <!-- end .news-events -->
    
    </div> <!-- end ,page-content -->
    
  <!-- </div> -->
  

  <?php get_footer( ); ?>
