<?php
/**
 * The template for displaying the search page
 *
 */
?>

<?php get_header(); ?>

<div id="content">
    
    <?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'wiStarter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php wiStarter_content_nav( 'nav-above' ); ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'search' ); ?>
			<?php endwhile; ?>

			<?php wiStarter_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'wiStarter' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'wiStarter' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>
    
    
</div> <!-- end of #content //-->

<?php  get_sidebar(); ?>

<?php  get_footer(); ?>