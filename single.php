<?php
/**
 * The Template for displaying all single posts.
 *
 */
?>
<div class="outer-container">

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', get_post_format() ); ?>

    <?php get_sidebar()  ?>

  <?php endwhile; // end of the loop. ?>
</div><!-- ENDS .outer-container -->

<div class="outer-container">
  <?php comments_template( '', true ); ?>
</div> <!-- ENDS .outer-container -->
