<?php 

/*********************************************************/
/*     Custom comment form                               */
/*********************************************************/

function starter_comment_form( $args = array(), $post_id = null ) {
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
      'title_reply'          => __( 'Leave A Reply' ),
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
