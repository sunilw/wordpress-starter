<?php
/*
/* template by Sunil Williams
/* Copyright for this template belongs to Sunil Williams
/* sunil@sunil.co.nz
/
/ * Template Name: videos
/*
 */?>

<div class="outer-container group">

  <h1>Video modal test</h1>

  <div class="content group">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="content-and-commentary">
        <?php get_template_part( 'content', get_post_format() ); ?>
      </div> <!-- .content-and-sidebar ends -->
    <?php endwhile; // end of the loop. ?>
  </div>

  <div id="video-link-container">

    <h2>loop through video posts</h2>

    <?php

    //
    // this loop creates our links
    //

    $args = array(
      'post_type' => 'videos',
      'posts_per_page' => 10
    ) ;
    $my_query = new WP_Query($args) ;
    ?>

    <?php

    if ($my_query->have_posts()) : ?>
    <?php $count = 1  ?>
    <section id="videos">
      <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <article class="video-link">

          <div class="cover">
            <a
              id="video-link-<?php echo $count ; $count++ ;   ?>"
              class="cover-link"
              href="#"
              >
              <img src="<?php echo get_post_meta($post->ID, '_cmb_video_cover', true)  ?>"
                   alt="#" />
            </a>
          </div> <!-- ENDS .cover -->

        </article> <!-- ENDS .video-link -->
      <?php endwhile; ?>     
    </section> <!-- ENDS #videos  -->
  <?php 
  // end our first loop
  endif; 
  rewind_posts(); 
  ?>

  </div><!-- ENDS video-link-container -->


  <div id="modal-link-container">

    <?php
    $args = array(
      'post_type' => 'videos'      
    ) ;

    $my_query = new WP_Query($args) ;  ?>
    <?php if ($my_query->have_posts()) :    ?>
      <?php $count = 1 ;  ?>
      
	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>	 
          <article id="modal-<?php echo $count ; $count++ ;   ?>"
	    class="modal-window"
	     > 
            <h3><?php echo  get_post_meta($post->ID, '_cmb_video_title', true) ?> </h3>
            <div>
	      <?php echo   get_post_meta($post->ID, '_cmb_video_link', true)  ?>
            </div>
	    
          </article>	    
	<?php endwhile; ?>
	
    <?php endif; ?>

  </div>  <!-- ENDS.modal-link-container -->


</div><!-- ENDS .outer-container -->
