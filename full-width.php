<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 */



get_header();  ?>

<div id="fullContent" role="main">
    
    <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page' ); ?>
            <?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>
    
    
</div> <!-- end of #content //-->



<?php  get_footer(); ?>