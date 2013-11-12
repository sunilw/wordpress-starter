<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>
<div class="outer-container">
  <div id="content" class="single-content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', get_post_format() ); ?>

      <nav class="nav-single">
        <h3 class="assistive-text"><?php _e( 'Post navigation'); ?></h3>
        <span class="nav-previous">
          <?php previous_post_link( '%link', '<span class="meta-nav">' .
                                    _x( '&larr;', 'Previous post link') . '</span> %title' ); ?>
        </span>
        <span class="nav-next">
          <?php next_post_link( '%link', '%title <span class="meta-nav">' .
                                _x( '&rarr;', 'Next post link' ) . '</span>' ); ?>
        </span>
      </nav><!-- .nav-single -->

      <?php comments_template( '', true ); ?>

    <?php endwhile; // end of the loop. ?>

  </div><!-- #content -->

  <?php get_sidebar()  ?>

</div><!-- ENDS .outer-container -->
