<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<?php if ( have_comments() ) : ?>
<div id="comments">
  <?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.'); ?></p>
</div><!-- #comments -->
<?php
/* Stop the rest of comments.php from being processed,
 * but don't kill the script entirely -- we still have
 * to fully load the template.
 */
return;
endif;
?>

  <ul>
  <?php
  wp_list_comments();
  ?>
  </ul>
</div><!-- #comments -->
 <?php  endif  ?>
