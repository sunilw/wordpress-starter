<?php
/**
 * The Template for displaying all single posts.
 *
 */
?>
<div class="outer-container group">

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="content-and-commentary">
      <?php get_template_part( 'content', get_post_format() ); ?>

      <?php starter_comment_form( '', true ); ?>



    </div> <!-- .content-and-sidebar ends -->

  <?php endwhile; // end of the loop. ?>


  <?php get_sidebar()  ?>

</div> <!-- ENDS .outer-container -->
