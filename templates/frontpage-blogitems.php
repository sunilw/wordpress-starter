<?php
/**
 *
 * This template gives us two news items for the frontpage
 * template built by Sunil Williams
 * sunil@sunil.co.nz
 *
 */
?>
<?php
$args = array(
  'posts_per_page' => 2
) ;
$my_query = new WP_Query($args) ;

?>
<?php if ($my_query->have_posts()) : ?>
  <section id="blog-latest">
    <h2>from the blog</h2>
    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <article class="news-preview">
        <h3><?php the_title()  ?></h3>
        <p><?php  the_excerpt(); ?></p>
	<p><a href="<?php echo get_permalink()  ?>">read more</a></p>
      </article>
    <?php endwhile; ?>
  </section> <!-- ENDS #blog-latest -->
<?php endif; ?>
