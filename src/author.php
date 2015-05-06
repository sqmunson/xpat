<?php get_header(); ?>

	<main role="main" class="content">
		<!-- section -->
		<section>

			<h1><?php _e( 'Archives for ', 'html5blank' ); echo get_the_author(); ?></h1>

			<?php if ( get_the_author_meta('description')) : ?>

				<div class="author-info">
					<?php echo get_avatar(get_the_author_meta('user_email')); ?>

					<h2><?php _e( 'About ', 'html5blank' ); echo get_the_author() ; ?></h2>

					<?php echo wpautop( get_the_author_meta('description') ); ?>
				</div>


			<?php endif; ?>

			<?php get_template_part('loop'); ?>

			<?php //get_template_part('pagination'); ?>

            <?php echo do_shortcode('[lazy_load]'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
