<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Halant:300,400,500,600,700|Mate:400,400italic|Roboto:400,100,300,300italic,100italic,400italic,500,500italic,700,700italic,900,900italic|Quattrocento+Sans:400,400italic,700,700italic|Source+Serif+Pro:400,600,700|Khula:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/fonts/stackicons/css/stackicons-min.css">

		<?php wp_head(); ?>
        <script type="text/javascript">
            // Taboola script part 1.
            // Part 2 is at the end of article in single.php
            // Part 3 is in footer.php
            window._taboola = window._taboola || [];
            _taboola.push({article:'auto'});
            !function (e, f, u) {
                e.async = 1;
                e.src = u;
                f.parentNode.insertBefore(e, f);
            }(document.createElement('script'), document.getElementsByTagName('script')[0], '//cdn.taboola.com/libtrc/xpatnation/loader.js');
        </script>

		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

            fbq('init', '1535361346713989');
            fbq('track', "PageView");
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1535361346713989&ev=PageView&noscript=1"/></noscript>
        <!-- End Facebook Pixel Code -->
	</head>
	<body <?php body_class(); ?>>

        <!-- FB -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="mobile-nav">
            <?php mobile_nav(); ?>

            <div class="search-wrapper">
                <?php get_template_part('searchform'); ?>
            </div>
        </div>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

                <!-- /menu-wrapper -->
                <div class="menu-wrapper clear">

					<!-- logo -->
                    <?php
                        $pego_logo = get_template_directory_uri()."/img/xpat_red.jpg";
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

                    <div class="fb-like-header">
                        <div class="fb-like" data-href="https://www.facebook.com/xpatnation" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                    </div>

                    <!-- search -->
                    <!-- <div class="search-wrapper">
                        <?php // get_template_part('searchform'); ?>
                    </div> -->
                    <!-- /search -->

					<!-- nav -->
					<nav class="nav desktop navigation" role="navigation">
                        <div class="shares">
                            <div class="fb-share share">
                                <a href="javascript:fb_share()" class="btn">
                                  <i class="st-icon-facebook"></i>
                                </a>
                            </div>
                            <div class="twitter-share share">
                                <a href="https://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>&via=XpatNation" target="_blank" class="btn">
                                  <i class="st-icon-twitter"></i>
                                </a>
                            </div>
                            <div class="email-share share">
                                <a href="mailto:?subject=<?php echo the_title(); ?>&body=<?php echo the_permalink(); ?>" target="_blank" class="btn">
                                  <i class="st-icon-email"></i>
                                </a>
                            </div>
                        </div>
                        <?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->

                    <div class="hamburger-holder">
                        <div class="shares">
                            <div class="fb-share share">
                                <a href="javascript:fb_share()" class="btn">
                                  <i class="st-icon-facebook"></i>
                                </a>
                            </div>
                            <div class="twitter-share share">
                                <a href="https://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>&via=XpatNation" target="_blank" class="btn">
                                  <i class="st-icon-twitter"></i>
                                </a>
                            </div>
                            <div class="email-share share">
                                <a href="mailto:?subject=<?php echo the_title(); ?>&body=<?php echo the_permalink(); ?>" target="_blank" class="btn">
                                  <i class="st-icon-email"></i>
                                </a>
                            </div>
                        </div>
                        <div class="hamburger"></div>
                    </div>
                </div>
                <!-- /menu-wrapper -->

			</header>
			<!-- /header -->

        <!-- content-wrapper -->
        <div class="content-wrapper clear">
