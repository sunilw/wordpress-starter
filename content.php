<?php
/**
 * The default template for displaying content.
 * Used for both single and index/archive/search.
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
    <div class="featured-post">
      <?php _e( 'Featured post'); ?>
    </div>
  <?php endif; ?>
  <header class="entry-header">
    <?php the_post_thumbnail(); ?>
    <?php if ( is_single() ) : ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>

      <div class="attribution">
        <p>
          by 
          <?php the_author_posts_link()  ?>

        </p>
      </div> <!-- ENDS .attribution -->

    <?php else : ?>
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h1>
    <?php endif; // is_single() ?>
    <?php if ( comments_open() ) : ?>
      <div class="comments-link">
        <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply' ) . '</span>',
                                  __( '1 Reply'), __( '% Replies') ); ?>
      </div><!-- .comments-link -->
    <?php endif; // comments_open() ?>
  </header><!-- .entry-header -->

  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
  <?php else : ?>
    <div class="entry-content">
      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>') ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
  <?php endif; ?>

  <footer class="entry-meta">
    <?php edit_post_link( __( 'Edit'), '<span class="edit-link">', '</span>' ); ?>
    <?php
    // If a user has filled out their description and this is a multi-author blog, show a bio on their entries.
    if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) :
    ?>
    <div class="author-info">
      <div class="author-avatar">
        <?php echo  get_avatar(
          get_the_author_meta( 'user_email' )
        );
        ?>
      </div><!-- .author-avatar -->
      <div class="author-description">
        <h2><?php printf( __( 'About %s' ), get_the_author() ); ?></h2>
        <p><?php the_author_meta( 'description' ); ?></p>
        <div class="author-link">
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
            <?php
            printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>'), get_the_author() ); ?>
          </a>
        </div><!-- .author-link       -->
      </div><!-- .author-description -->
    </div><!-- .author-info -->
  <?php endif; ?>
  </footer><!-- .entry-meta -->
</article><!-- #post -->