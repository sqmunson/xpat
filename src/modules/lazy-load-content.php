<?php
  $featured = has_term( 'featured', 'post_tag');
  $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false );
  // $post_alternative_cat_tag = get_post_meta($post->ID,'post_alternative_cat_tag', true);
  // $the_categories = wp_get_post_categories( $post->ID );
  // $cat = get_category( $the_categories[0] );
?>
<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class( array('clear','list') ); ?>>

  <!-- post thumbnail -->
  <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
  <div class="<?php echo $featured ? 'featured-img' : 'regular-img'; ?>">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <div class="img" style="background-image: url('<?php echo $img[0]; ?>');"></div>
      <?php //the_post_thumbnail(); // Declare pixel size you need inside the array ?>
    </a>
    <?php
      if ($featured) {
        ?>
          <div class="title-container">
            <!-- post title -->
            <h2>
              <a class="feature-h2-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
            <!-- /post title -->
          </div>
        <?php
      }
    ?>
  </div>
  <?php endif; ?>
  <!-- /post thumbnail -->

  <div class="<?php echo $featured ? 'featured-info-container' : 'info-container'; ?>">

      <!-- post title -->
      <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
      </h2>
      <!-- /post title -->

    <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

    <!-- post details -->
    <span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author_posts_link(); ?> | </span>
    <span class="date">
      <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
        <?php //the_date(); ?> <?php the_time('F j, Y'); ?>
      </time>
    </span>
    <span class="comments"><?php // if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
    <!-- /post details -->

  </div>

</article>
<!-- /article -->