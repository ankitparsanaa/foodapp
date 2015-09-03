  <?php if(!is_user_logged_in()){ ?>
    <!-- HEADER REGISTER -->
    <div class="header-register">
      <a href="#" class=""><?php _e('Register', 'takeaway'); ?></a>

      <div>
        <form method="post" action="" id="takeaway_registration_form">
                 
                  <p class="status-reg"></p>
                  <input type="text" name="user_name" class="form-control" placeholder="Username">
                  <input type="email" name="email" class="form-control" placeholder="Email">
                  <input type="password" name="reg_password" class="form-control" placeholder="Password">
                  <input type="submit" id="takeaway_registration_form_submit" class="btn btn btn-default-red-inverse" value="Register">

                  <!-- <input type="submit" class="btn btn-default" name="registration_submit" id="bingo_registration_form_submit" value="Register"> -->
        </form>
      </div>

    </div> <!-- END .HEADER-REGISTER -->
    <?php } ?>

    <?php $current_user = wp_get_current_user(); ?> 
      <?php if(is_user_logged_in()){ ?>


     
        
          <div class = "profile">
            <a href="<?php echo esc_url(home_url( )); ?>/wp-admin/profile.php" title="Edit profile"><i class="fa fa-user"></i>&nbsp;<?php echo esc_attr($current_user->user_login); ?></a>
          </div>
          
          <div class="logout">
             <a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>" title="Logout"><i class="fa fa-power-off"></i>&nbsp;<?php _e('Logout', 'takeaway'); ?></a>
          </div>
      
          
        <?php } else {?>

    <div class="header-login">

      <a href="#" class=""><?php _e('Login', 'takeaway'); ?></a>

      <div>
        <form id="bg-login-form" method="post" action="login" role="form">
                  <p class="status"></p>
                  <input type="text" name="login_username" value="" class="form-control" placeholder="Username">
                  <input type="password" name="login_password" value="" class="form-control" placeholder="Password">
                  <p class="submit form-row">
                    <input type="submit" name="wp-submit" id="bg-login" class="btn btn-default-red-inverse" value="Login">
                    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>">
                    <input type="hidden" name="testcookie" value="1">
                  </p>
                  <!-- <input type="submit" class="btn btn-default" id="bg-login" name="dlf_submit" value="Login"> -->
                  <a href="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="btn btn-link"><?php _e('Forgot Password?', 'takeaway'); ?></a>
                  <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                </form>
      </div>

    </div> <!-- END .HEADER-LOGIN -->
  <?php } ?>