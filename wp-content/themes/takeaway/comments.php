    <?php 
    // Prevent the direct loading of the file

        if (!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == comments.php) {
        die(__('you cannot access this file directory', ' takeaway' ));
        }

        //check if post is password protected

        if (post_password_required()) : 
    ?>
        <p>
            <?php _e('This is password protected. Enter the password to view the comments.', 'takeaway'); ?>
            <?php return; ?>
        </p>

    <?php endif;

    if (have_comments()): ?>
    <div class="comments-section">  
            <h5><?php  comments_number(__('No comment','takeaway'), __('One comment','takeaway'), __('Comments (%)','takeaway') ); ?></h5>
            <ul class="comments">
                <li>
                   <?php wp_list_comments( 'callback=takeaway_comments' ); ?>            
                </li>
            </ul>                
    </div>


    <?php if(get_comment_count()> 1 && get_option('page_comments')) : ?>

        <div class="comments-nav-section clearfix">
            <p class="fl"> <?php previous_comments_link(__('&larr; Older Comments', 'adaptive-framework') ); ?></p>
            <p class="fl"> <?php next_comments_link(__( 'Newer Comments &rarr;', 'adaptive-framework') ); ?></p>
        </div> <!-- end comments-nav-section -->

    <?php endif; ?>

    <?php elseif (!comments_open()  && post_type_supports(get_post_type(), 'comments')) : ?>
        <p><?php _e('Comments are closed.', 'takeaway'); ?></p>
    <?php endif; ?>

            
    <div class="leave-reply">
     <?php  comment_form();?>
    </div>





              

