<?php get_header(); ?>

	<main role="main" class="content">
	<!-- section -->
	<section id="content">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('main-post'); ?>>
			<!-- post title -->
			<h1>
				<?php the_title(); ?>
			</h1>
			<!-- /post title -->

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post details -->
			<div class="details">
				<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="date">
					<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
						<?php the_date(); ?> <?php the_time(); ?>
					</time>
				</span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
			</div>
			<!-- /post details -->

			<div class="shares clear mobile">
                <div class="fb-share share">
                    <a href="javascript:fb_share()" class="btn">
                    	<i class="icon-2x icon-facebook-sign"></i>
          				<span>SHARE</span>
                    </a>
                </div>
                <div class="twitter-share share">
                    <a href="https://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>&via=XpatNation" target="_blank" class="btn">
                    	<i class="icon-2x icon-twitter-sign"></i>
              			<span>TWEET</span>
                    </a>
                </div>
            </div>

			<?php the_content(); // Dynamic Content ?>

			<div class="shares clear">
                <div class="fb-share share">
                    <a href="javascript:fb_share()" class="btn">
                    	<i class="icon-2x icon-facebook-sign"></i>
          				<span>SHARE</span>
                    </a>
                </div>
                <div class="twitter-share share">
                    <a href="https://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>&via=XpatNation" target="_blank" class="btn">
                    	<i class="icon-2x icon-twitter-sign"></i>
              			<span>TWEET</span>
                    </a>
                </div>
            </div>
			
			<div class="author-details">
				<span class="author"><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></span>
				<?php the_author_meta('description'); ?> 
			</div>
			<?php //the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
			<span class="categories"><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></span>
			<span class="tags"><?php pk_the_tags( __( 'Tags: ', 'html5blank' ), ', ', '', 'featured,evergreen'); ?></span>

			<?php // edit_post_link(); // Always handy to have Edit Post Links available ?>

			<?php comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php //echo do_shortcode('[ajax_load_more post_type="post" max_pages="0" scroll=true pause=false]'); ?>
    <?php echo do_shortcode('[lazy_load]'); ?>


	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
