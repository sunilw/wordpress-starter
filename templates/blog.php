<?php
/**
Page Template for showing blog entries

Author:             Sunil Williams
Author URI:         http://sunil.co.nz
Template Name:      Blog

 */
?>

<div class="outer-container">
  <section id="blog-entries">
    <?php
    $args = array(
      'posts_per_page' => 2
    ) ;
    $my_query = new WP_Query($args) ;

    ?>
    <?php if ($my_query->have_posts()) : ?>
      <section id="">
	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
	  <article class="">
            <h3><?php the_title()  ?></h3>
            <p><?php  the_excerpt(); ?></p>
	    <p><a href="<?php echo get_permalink()  ?>">read more</a></p>
	  </article>
	<?php endwhile; ?>
      </section> <!-- ENDS #...  -->
    <?php endif; ?>
  </section> <!-- ENDS #blog-entries -->

  <?php 
  if (is_dynamic_sidebar('home_right_1')) { ?>
  <aside class="sidebar">
    <?php dynamic_sidebar('home_right_1') ;  ?>
  </aside><!-- ENDS .sidebar -->
  <?php   }  ?>

</div> <!-- ENDS .outer-container -->
