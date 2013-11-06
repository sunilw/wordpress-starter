<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="outer-container">

    <header class="entry-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php the_post_thumbnail(); ?>
    </header>

    <div class="entry-content">
      <?php the_content(); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:'), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit'), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </div> <!-- ENDS .outer-container -->
</article><!-- #post -->
