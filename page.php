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

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', get_post_format() ); ?>

    <?php get_sidebar()  ?>

  <?php endwhile; // end of the loop. ?>

  <?php   starter_comment_form('', true );     ?>
</div> <!-- ENDS .outer-container -->
