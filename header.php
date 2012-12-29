<?php
/**
 * The template for displaying and containing meta information
 *
 */
?>

<!DOCTYPE html>

<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> >
<!--<![endif]-->

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width"/>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
   
        <?php wp_head(); ?> <!--wordpress header tag-->
    </head>

   <body <?php body_class(); ?>>

           <div id="wrapper">

             <header role="banner" id="masthead">

                <div id= "branding">
                 
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
                <?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>

                        </div> <!-- end of #branding //-->
                        
                        <div id="social">
                            Social
                        </div> <!-- end of #social //-->

                        
                        
                </header>
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                                <a class="toggleMenu" href="#">Menu</a> <!-- Toggle menu on small screens -->
                                <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'wiStarter' ); ?>"><?php _e( 'Skip to content', 'wiStarter' ); ?></a>
                                <?php wp_nav_menu( array('menu' => 'Navigation Menu' )); ?>
                        </nav>