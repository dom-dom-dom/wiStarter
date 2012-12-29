<?php get_header(); ?>




<div id="content" class="clear">
    
   <?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				
			<?php endwhile; // end of the loop. ?>
    
    
</div> <!-- end of #content //-->

<?php  get_sidebar(); ?>

<?php  get_footer(); ?>