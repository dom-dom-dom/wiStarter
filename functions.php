<?php

/**
 * wiStarter functions and definitions.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;


/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function wiStarter_content_width() {
	if ( is_page_template( 'full-width.php' ) || is_attachment() || ! is_active_sidebar( 'front' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
function wiStarter_setup() {
	/*
	 * Makes theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on theme, use a find and replace
	 * to change 'wiStarter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wiStarter', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
}

//AUTOMATIC FEED LINKS
add_theme_support( 'automatic-feed-links' );

//dynamic sidebars
	
function wiStarter_widgets_init() {
		register_sidebar( array(
		'name' => __( 'Front', 'wiStarter' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'wiStarter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Side Top Widget Area', 'wiStarter' ),
		'id' => 'sideTop',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wiStarter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Side Bottom Widget Area', 'wiStarter' ),
		'id' => 'sideBottom',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wiStarter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'wiStarter_widgets_init' );
            
	

//navigation menu
    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus(array
            (
             'top menu' => 'Navigation Menu',
             'foot_menu' => 'Footer Menu',
             )
        );
    }

//Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support('post-thumbnails');
        set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

//Dynamic Copyright
	function wiStarter_copyright() {
		global $wpdb;
		$copyright_dates = $wpdb->get_results("
	SELECT
		YEAR(min(post_date_gmt)) AS firstdate,
		YEAR(max(post_date_gmt)) AS lastdate
	FROM
		$wpdb->posts
	WHERE
		post_status = 'publish'
	");
	$output = '';
		if($copyright_dates) {
			$copyright = "&copy; " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
	$output = $copyright;
	}
	return $output;
	}
        
//Add CUSTOM BACKGROUND

	$defaults = array(
	'default-color'          => 'e6e6e6',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/custom-header.php' );


// ADD POST FORMATS
add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );


/**
 * Displays navigation to next/previous pages when applicable.
 *
 */
if ( !function_exists( 'wiStarter_content_nav' ) ) :

function wiStarter_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
                    <h3 class="assistive-text"><?php _e( 'Post navigation', 'wiStarter' ); ?></h3>
                    <div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'wiStarter' ) ); ?></div>
                    <div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wiStarter' ) ); ?></div>
            </nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;


function wiStarter_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'wiStarter-navigation', get_template_directory_uri() . '/js/nav.js', array(), '1.0', true );
        wp_enqueue_script( 'wiStarter-ui', get_template_directory_uri() . '/js/script.js', array(), '1.0', true );
	

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'wiStarter-style', get_stylesheet_uri() );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'wiStarter-ie', get_template_directory_uri() . '/css/ie.css', array( 'wiStarter-style' ), '20121010' );
	$wp_styles->add_data( 'wiStarter-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'wiStarter_scripts_styles' );


function wiStarter_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'wiStarter_page_menu_args' );


function wiStarter_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wiStarter' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wiStarter_wp_title', 10, 2 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *

 */
function wiStarter_customize_preview_js() {
	wp_enqueue_script( 'wiStarter-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'wiStarter_customize_preview_js' );


/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function wiStarter_body_class( $classes ) {
	$background_color = get_background_color();

	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-2' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'wiStarter_body_class' );

if ( ! function_exists( 'wiStarter_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own wiStarter_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function wiStarter_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'wiStarter' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'wiStarter' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'wiStarter' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'wiStarter' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wiStarter' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'wiStarter' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'wiStarter' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'wiStarter_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own wiStarter_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function wiStarter_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'wiStarter' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'wiStarter' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wiStarter' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'wiStarter' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'wiStarter' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'wiStarter' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

//filter <p> tages on images

// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function wiStarter_remove_img_ptags($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'wiStarter_remove_img_ptags');




// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );
?>