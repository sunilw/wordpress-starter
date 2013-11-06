<?php
/*
/* template by Sunil Williams
/* for vframe
/* Copyright for this template belongs to Sunil Williams
/* sunil@sunil.co.nz
/*
/* This file provides the template for the contact page
/*
/* Template Name: Contact Page
/*
 */
?>
<?php while ( have_posts() ) : the_post(); ?>
  <div class="outer-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="outer-wrapper">
	<header class="entry-header">
	  <h1 class="entry-title">
	    Lets Connect
	  </h1>
	</header>
	<article class="entry-content">

          <div class="contact-message">
	    <p>
	      The contact message is here. It's hardcoded into the 
	      template. Make this message meaningful and human. Remind the user that
	      we can be contacted via phone
	    </p>
          </div>

	  

	  <?php echo do_shortcode('[contact-form-7 id="93" title="Contact form 1"]')  ?>

	  <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:'), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
	  <?php edit_post_link( __( 'Edit'), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

    </article><!-- #post -->
      </article>  <!-- ENDS outer-container -->

      <?php get_sidebar()  ?>

<?php endwhile; // end of the loop. ?>
