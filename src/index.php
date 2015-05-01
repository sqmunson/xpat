<?php get_header(); ?>

	<main role="main" class="content">
        <div class="header-ad">
            <?php
                // ad at the very top
                echo do_shortcode('[ad type="desktop" size="728x90"]');
                // echo do_shortcode('[ad type="mobile" size="300x250"]');
            ?>    
        </div>

		<!-- section -->
		<section id="content">

			<!-- <h1><?php // _e( 'Latest Posts', 'html5blank' ); ?></h1> -->

			<?php get_template_part('loop'); ?>

            <?php // get_template_part('pagination'); ?>


		</section>
		<!-- /section -->

            <?php //echo do_shortcode('[ajax_load_more post_type="post" scroll_distance="0"]'); ?>
            <?php echo do_shortcode('[lazy_load]'); ?>
        
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
