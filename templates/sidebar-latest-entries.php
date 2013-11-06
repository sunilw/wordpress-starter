<?php
/*
/* template by Sunil Williams
/* for vframe
/* Copyright for this template belongs to Sunil Williams
/* sunil@sunil.co.nz
/*
/* This template will display the latest news item
/*
 */
?>
<?php

$args = array(
  'posts_per_page' => 4,
) ;

$the_query = new WP_Query($args) ;

?>
<?php

if ( $the_query->have_posts() ) { ?>
<section class="latest-news group">
  <header>
    <h3>
      Latest Posts
    </h3>
  </header>
  <ul id="latest-news" class="row-content group">
    <?
    while ( $the_query->have_posts() ) {
      $the_query->the_post(); ?>

    <li>
    <header class="newspost-header group">
      <h4>
        <a href="<?php echo the_permalink()  ?>">
          <?php echo  get_the_title() ?>
        </a>
      </h4>
    </header>

    <div class="sidebar-post-featured-thumb">
      <?php
      echo get_the_post_thumbnail()
      ?>
    </div>

    <p class="news-preview">
      By <?php echo get_the_author()  ?>
    </p>
    <p class="readmore">
      <a href="<?php echo the_permalink()  ?>">Read More</a>
    </p>
    </li>
    <?  } // end while ?>

  </ul>
</section>

<? } // end if
else{ ?>
<!-- no latest news posts -->
<? } ?>
