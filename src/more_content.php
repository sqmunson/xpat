<li<?php if (! has_post_thumbnail() ) { echo ' class="no-img"'; } ?>>
   <?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(150,150));
   }?>
   <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();?></a></h3>
   <h3><?php the_category(', '); ?></h3>
   <?php var_dump($featured_post_args); ?>
   <?php var_dump($regular_post_args); ?>
   <?php
    if (has_term( 'featured', 'post_tag')) {
        ?>
            <h3>FEATURED</h3>
        <?php
    }
   ?>
   <p class="entry-meta">
       <?php the_time("F d, Y"); ?>
   </p>
   <?php the_excerpt(); ?>
</li>