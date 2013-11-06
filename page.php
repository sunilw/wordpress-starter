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
<?php while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'content', 'page' ); ?>
  <article class="outer-container">
    <?php  //comments_template( '', true );
    wpf_comment_form() ;
    ?>
  </article>
<?php endwhile; // end of the loop. ?>
