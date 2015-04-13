<!-- sidebar -->
<aside class="sidebar" role="complementary">
    <!-- search -->
    <div class="search-wrapper">
        <?php get_template_part('searchform'); ?>
    </div>
    <!-- /search -->
    <div class="fb-share"></div>
    <div class="twitter-share"></div>

	<?php // get_template_part('searchform'); ?>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

</aside>
<!-- /sidebar -->
