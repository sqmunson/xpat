<?php get_header(); ?>

	<main role="main" class="content">
		<div class="header-ad">
            <?php
                // ad at the very top
                echo do_shortcode('[ad type="desktop" size="728x90"]');
                echo do_shortcode('[ad type="mobile" size="300x250"]');
            ?>
        </div>

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
			<div class="featured-image">
				<?php if ( has_post_format( 'image' ) && has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				<?php endif; ?>
			</div>
			<!-- /post thumbnail -->

			<!-- post details -->
			<div class="details clear">
				<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="date">
					<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
						<?php the_date(); ?> <?php the_time(); ?>
					</time>
				</span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
			</div>
			<!-- /post details -->

			<div class="fb-in-post desktop">
				<div class="fb-like" data-href="https://www.facebook.com/xpatnation" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
			</div>
			<div class="fb-in-post mobile">
				<div class="fb-like" data-href="https://www.facebook.com/xpatnation" data-width="300" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
			</div>

			<div class="shares clear mobile">
                <div class="fb-share share">
                    <a href="javascript:fb_share()" class="btn">
                    	<i class="st-icon-facebook"></i>
          				<span>SHARE</span>
                    </a>
                </div>
                <div class="twitter-share share">
                    <a href="https://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>&via=XpatNation" target="_blank" class="btn">
                    	<i class="st-icon-twitter"></i>
              			<span>TWEET</span>
                    </a>
                </div>
                <div class="email-share share">
	                <a href="mailto:?subject=<?php echo the_title(); ?>&body=<?php echo the_permalink(); ?>" target="_blank" class="btn">
	                  <i class="st-icon-email"></i>
	                  <span>EMAIL</span>
	                </a>
	            </div>
            </div>

            <div class="article-content">
                <?php the_content(); ?>
            </div>

			<div class="shares clear">
                <div class="fb-share share">
                    <a href="javascript:fb_share()" class="btn">
                    	<i class="st-icon-facebook"></i>
          				<span>SHARE</span>
                    </a>
                </div>
                <div class="twitter-share share">
                    <a href="https://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>&via=XpatNation" target="_blank" class="btn">
                    	<i class="st-icon-twitter"></i>
              			<span>TWEET</span>
                    </a>
                </div>
                <div class="email-share share">
	                <a href="mailto:?subject=<?php echo the_title(); ?>&body=<?php echo the_permalink(); ?>" target="_blank" class="btn">
	                  <i class="st-icon-email"></i>
	                  <span>EMAIL</span>
	                </a>
	            </div>
            </div>


            <!-- MEDIABONG -->
            <div id="mb_container"></div>
            <div id="mb_video_sponso"></div>
            <script type="text/javascript">
            (function(){
                var sc = document.createElement('script');
                sc.src = 'http://player.mediabong.net/se/209.js?url='+encodeURIComponent(document.location.href);
                sc.type = 'text/javascript';
                sc.async = true;
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sc, s);
            })();
            </script>
            <!-- MEDIABONG -->


			<div class="meta-container">
				<div class="author-details clear">
					<div class="author">
						<span class="label"><?php _e( 'Written by ', 'html5blank' ); ?></span>
						<?php the_author_posts_link(); ?>
					</div>
					<?php // the_author_meta('description'); ?>
				</div>
				<?php //the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
				<div class="categories"><span class="label"><?php _e( 'Categorized in ', 'html5blank' ); ?></span> <?php the_category(', '); // Separated by commas ?></div>
				<?php $tags = get_the_tags(); if (!empty($tags)) { ?>
					<div class="tags"><span class="label"><?php _e( 'Tagged with ', 'html5blank' ); ?></span><?php pk_the_tags( '', ', ', '', 'featured,evergreen'); ?></div>
				<?php } ?>
			</div>

			<?php // edit_post_link(); // Always handy to have Edit Post Links available ?>

			<div class="fb-comments" data-href="<?php echo the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>

			<?php // comments_template(); ?>

			<div class="taboola-container">
				<div id="taboola-below-article"></div>
				<script type='text/javascript'>
					// Taboola Part 2, div#taboola-below-article is only dependency, container is for our custom styling
					window._taboola = window._taboola || [];
					_taboola.push({mode:'thumbnails-a', container:'taboola-below-article', placement:'below-article', target_type: 'mix'});
				</script>
			</div>


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
