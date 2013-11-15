<?php
/**
 * The Template for displaying all single posts.
 *
 */
?>
<div class="outer-container group">

  <?php while ( have_posts() ) : the_post(); ?>
    <div class="content-and-commentary">
      <?php

      // echo the content
      get_template_part( 'content', get_post_format() ) ;

      // echo the comment form
      starter_comment_form( '', true );

      comments_template() ;
      
    ?>

</div> <!-- .content-and-sidebar ends -->

  <?php endwhile; // end of the loop.
  ?>

  <?php
  // if the sidebar has widgets active
  // if true, then show the sidebar

  if (is_dynamic_sidebar('home_right_1')) { ?>
  <aside class="sidebar">
    <?php dynamic_sidebar('home_right_1') ;  ?>
  </aside><!-- ENDS .sidebar -->
  <?php   }  ?>
</div> <!-- ENDS .outer-container -->
