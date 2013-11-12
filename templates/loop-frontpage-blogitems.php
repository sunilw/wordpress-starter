<?php
/**
 *
 * This template gives us two news items for the frontpage
 *
 *
 * template built by Sunil Williams
 * sunil@sunil.co.nz
 *
 */
?>
<?php if (have_posts()) : ?>
  <section id="latest-news-preview">
  <?php while (have_posts()) : the_post(); ?>
    <!-- do stuff ... -->
  <?php endwhile; ?>
  </section><!-- ENDS #latest-news-preview -->
<?php endif; ?>
