<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

                <!-- /menu-wrapper -->
                <div class="menu-wrapper clear">

					<!-- logo -->
                    <?php
                        $pego_logo = get_template_directory_uri()."/images/logo.png";
                        $pego_logo_retina = '';

                        if ( function_exists( 'ot_get_option' ) ) {
                            if (ot_get_option('meganews_logo') != '') {
                                $pego_logo = ot_get_option('meganews_logo');
                            }
                            if (ot_get_option('meganews_logo_retina') != ''){
                                $pego_logo_retina = ot_get_option('meganews_logo_retina');
                            }
                        }
                    ?>
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<!-- <img src="<?php // echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img"> -->

                            <!-- two logos, one for retina. style would come from meganews -->
                            <img id="logoImage" src="<?php echo $pego_logo; ?>" alt="Logo" class="logo-img" />
                            <!-- <img id="logoImageRetina" src="<?php // echo $pego_logo_retina; ?>" alt="Logo" class="logo-img" /> -->
						</a>
					</div>
					<!-- /logo -->

                    <!-- search -->
                    <div class="search-wrapper">
                        <?php get_template_part('searchform'); ?>
                    </div>
                    <!-- /search -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->

                </div>
                <!-- /menu-wrapper -->

			</header>
			<!-- /header -->

        <!-- content-wrapper -->
        <div class="content-wrapper clear">
