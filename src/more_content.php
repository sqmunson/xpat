<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- post thumbnail -->
  <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
    </a>
  <?php endif; ?>
  <!-- /post thumbnail -->

  <!-- post title -->
  <h2>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
  </h2>
  <!-- /post title -->

  <?php
    if (has_term( 'featured', 'post_tag')) {
        ?>
            <h3>FEATURED</h3>
        <?php
    }
    the_category(', ');
    var_dump($featured_post_args);
    var_dump($regular_post_args);
    var_dump($categories);
   ?>

  <!-- post details -->
  <span class="date">
    <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
      <?php the_date(); ?> <?php the_time(); ?>
    </time>
  </span>
  <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
  <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
  <!-- /post details -->

  <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

</article>
<!-- /article -->