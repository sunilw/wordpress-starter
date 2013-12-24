<?php
/**
 * The Template for displaying all single posts.
 *
 */
?>
<div class="outer-container group">

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="content-and-commentary">

      <h2>single video</h2>

      <pre>
	<?php 	
	 print_r( get_post_meta( $post->ID ) ) ;	
	?>
      </pre>

      <?php get_template_part( 'content', get_post_format() ); ?>

      <section class="video-link">
	
	<h2>In Video Link...</h2>
	
	<h3><?php echo get_post_meta( $post->ID, '_cmb_video_title', true )  ?></h3>

        <div class="cover">
          <a class="cover-link"
	     href="#"
	     >
	  <img src="<?php echo get_post_meta($post->ID, '_cmb_video_cover', true)  ?>" 
	       class="" 
	       alt="" />
	  </a>
        </div>
	
      </section> <!-- ENDS .video-link -->


      <?php starter_comment_form( '', true ); ?>
      <?php
      comments_template()  ;
      ?>
    </div> <!-- .content-and-sidebar ends -->

  <?php endwhile; // end of the loop. ?>


  <?php
  // if the sidebar has widgets active
  // if true, then show the sidebar
  if (is_dynamic_sidebar('home_right_1')) { ?>
  <aside class="sidebar">
    <?php dynamic_sidebar('home_right_1') ;  ?>
  </aside><!-- ENDS .sidebar -->
  <?php   }  ?>
</div> <!-- ENDS .outer-container -->
