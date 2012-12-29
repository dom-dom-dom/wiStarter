<?php
/**
 * The sidebar containing the front page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 */

/*
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( ! is_active_sidebar( 'front' )  )
	return;

// If we get this far, we have widgets. Let do this.
?>
<div id="secondary" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'front' ) ) : ?>
	<div class="first front-widgets">
		<?php dynamic_sidebar( 'front' ); ?>
	</div><!-- .first -->
	<?php endif; ?>

	

</div><!-- #secondary -->