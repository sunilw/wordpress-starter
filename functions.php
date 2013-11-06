<?php

// ------------------------------------------------------------------
// Custom settings
// ------------------------------------------------------------------
//


/**
 * Register our sidebars and widgetized areas.
 *
 */
function altart_widgets_init() {

	register_sidebar( array(
		'name' => 'main sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'altart_widgets_init' );


show_admin_bar( false );


/*********************************************************/
/*  Admin panel hacks                                    */
/*********************************************************/

function admin_css() {
  wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );

/*********************************************************/
/* template wrappers, introduced by scribu               */
/* http://scribu.net/wordpress/theme-wrappers.html       */
/*********************************************************/


function my_template_path() {
  return My_Wrapping::$main_template;
}

function my_template_base() {
  return My_Wrapping::$base;
}

class My_Wrapping {

  /**
   * Stores the full path to the main template file
   */
  static $main_template;

  /**
   * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
   */
  static $base;

  static function wrap( $template ) {
    self::$main_template = $template;

    self::$base = substr( basename( self::$main_template ), 0, -4 );

    if ( 'index' == self::$base )
    self::$base = false;

    $templates = array( 'wrapper.php' );

    if ( self::$base )
    array_unshift( $templates, sprintf( 'wrapper-%s.php', self::$base ) );

    return locate_template( $templates );
  }
}

add_filter( 'template_include', array( 'My_Wrapping', 'wrap' ), 99 );


/*********************************************************/
/*       Wrappers done. Move on to other stuff....       */
/*********************************************************/



/*********************************************************/
/*       Add support for post excerpts in pages          */
/*********************************************************/
add_post_type_support( 'page', 'excerpt' );


/*********************************************************/
/*       Add support for post thumbnails                 */
/*********************************************************/

add_theme_support('post-thumbnails') ;


/*********************************************************/
/*     Get rid of dots in excerpts                       */
/*********************************************************/

function wpf_excerpt_more($more) {
  global $post;
  return '' ;
}
add_filter('excerpt_more', 'wpf_excerpt_more') ;




/*********************************************************/
/*     Custom comment form                               */
/*********************************************************/
function wpf_comment_form( $args = array(), $post_id = null ) {
  global $id;

  if ( null === $post_id )
  $post_id = $id;
  else
  $id = $post_id;

  $commenter = wp_get_current_commenter();
  $user = wp_get_current_user();
  $user_identity = $user->exists() ? $user->display_name : '';

  $req      = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );
  $html5    = isset( $args['format'] ) && 'html5' === $args['format'];
  $fields   =  array(
    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                                                                                              '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
    'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                                                                                        '<input id="email" name="email" ' . ( $html5 ? 'type="email" pattern=""' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
    'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
                                                                      '<input id="url" name="url" ' . ( $html5 ? 'type="url" pattern=""' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
  );

  $required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
  $defaults = array(
      'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
      'comment_field'        => '<p class="comment-form-comment group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment"  aria-required="true"></textarea></p>',
      'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
      'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
      'comment_notes_before' => '',
      'comment_notes_after'  => '',
      'id_form'              => 'commentform',
      'id_submit'            => 'submit',
      'title_reply'          => __( 'Leave a Reply' ),
      'title_reply_to'       => __( 'Leave a Reply to %s' ),
      'cancel_reply_link'    => __( 'Cancel reply' ),
      'label_submit'         => __( 'Post Comment' ),
      'format'               => 'xhtml',
    );

    $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

?>
<?php if ( comments_open( $post_id ) ) : ?>
  <?php do_action( 'comment_form_before' ); ?>
  <div class="respond">
    <h3 id="reply-title">
      <?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?>
    </h3>
    <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
      <?php echo $args['must_log_in']; ?>
      <?php do_action( 'comment_form_must_log_in_after' ); ?>
    <?php else : ?>
      <form
        action="<?php echo site_url( '/wp-comments-post.php' ); ?>"
        method="post"
        id="<?php echo esc_attr( $args['id_form'] ); ?>"<?php echo $html5 ? ' novalidate' : ''; ?>
        class="group"
        >
        <?php do_action( 'comment_form_top' ); ?>
        <?php if ( is_user_logged_in() ) : ?>
          <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
          <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
        <?php else : ?>
          <?php echo $args['comment_notes_before']; ?>
          <?php
          do_action( 'comment_form_before_fields' );  ?>

          <div id="comment-inputs" class="group">

            <?php
            foreach ( (array) $args['fields'] as $name => $field ) {
              echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
            }
            do_action( 'comment_form_after_fields' );
            ?>

          </div>  <!-- ENDS .comment-inputs -->

        <?php endif; ?>

        <div id="comment-textarea-container" class="group">

          <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>

        </div>  <!-- ENDS #comment-textarea-container -->

        <?php echo $args['comment_notes_after']; ?>
        <p class="form-submit group">
          <input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
          <?php comment_id_fields( $post_id ); ?>
        </p>
        <?php do_action( 'comment_form', $post_id ); ?>
      </form>
    <?php endif; ?>
  </div><!-- #respond -->
  <?php do_action( 'comment_form_after' ); ?>
<?php else : ?>
  <?php do_action( 'comment_form_comments_closed' ); ?>
<?php endif; ?>
<?php
}


// ------------------------------------------------------------------
// Time ago
// ------------------------------------------------------------------

function time_ago( $type = 'post' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}


/************************/
/* enqueue scripts      */
/************************/

add_action("wp_enqueue_scripts", "wps_scripts") ;

function wps_scripts()
{

  wp_deregister_script('jquery');
  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null);
  wp_enqueue_script('jquery');

}


require('functions-woocommerce.php') ;
