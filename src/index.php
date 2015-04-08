<?php get_header(); ?>

	<main role="main" class="content">
		<!-- section -->
		<section id="content">

			<h1><?php // _e( 'Latest Posts', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

            <?php // get_template_part('pagination'); ?>


		</section>
		<!-- /section -->

            <?php echo do_shortcode('[ajax_load_more post_type="post" scroll_distance="0"]'); ?>
        
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
