<?php get_header(); ?>

	<main role="main" class="content">
		<!-- section -->
		<section>

			<h1><?php _e( '', 'html5blank' ); single_cat_title(); ?></h1>

			<p>
				<?php echo category_description(); ?>
			</p>

			<?php get_template_part('loop'); ?>

			<?php //get_template_part('pagination'); ?>

            <?php echo do_shortcode('[lazy_load]'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
