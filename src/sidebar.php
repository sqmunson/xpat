<!-- sidebar -->
<aside class="sidebar" role="complementary">
    
    <div class="fb-like" data-href="https://www.facebook.com/xpatnation" data-width="300" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>
    
    <div class="shares">
        <div class="fb-share share">
            <a href="javascript:fb_share()" class="btn">
              <i class="icon-2x icon-facebook-sign"></i>
              <span>SHARE</span>
            </a>
        </div>
        <div class="twitter-share share">
            <a href="https://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>&via=XpatNation" target="_blank" class="btn">
              <i class="icon-2x icon-twitter-sign"></i>
              <span>SHARE</span>
            </a>
        </div>
    </div>

    <!-- search -->
    <div class="search-wrapper">
        <?php get_template_part('searchform'); ?>
    </div>
    <!-- /search -->

	<?php // get_template_part('searchform'); ?>

    <?php 
        $evergreen_query = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 2,
            'post_status' => 'publish',
            'tag' => 'evergreen',
        ));
        if ( $evergreen_query->have_posts() ) {
            while ( $evergreen_query->have_posts() ) {
                $evergreen_query->the_post();
                ?>
                    
                    <div class="evergreen">
                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" />
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    </div>

                <?php
            }
        }
        wp_reset_postdata(); /* Restore original Post Data */
    ?>

    <div class="ad-300x600"></div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>
    
    <div class="sticky-featured">
        
        <div class="fb-like sticky-fb-like" data-href="https://www.facebook.com/xpatnation" data-width="300" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>

        <span class="featured-heading">FEATURED</span>

        <?php 
            $evergreen_query = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'post_status' => 'publish',
                'tag' => 'featured',
            ));
            if ( $evergreen_query->have_posts() ) {
                while ( $evergreen_query->have_posts() ) {
                    $evergreen_query->the_post();
                    ?>
                        
                        <div class="featured">
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                    <?php
                }
            }
            wp_reset_postdata(); /* Restore original Post Data */
        ?>
    </div>

    <div class="sticky-ad ad-300x250"></div>
    

</aside>
<!-- /sidebar -->
