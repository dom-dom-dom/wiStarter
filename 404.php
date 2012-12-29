<?php get_header(); ?>




<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'boxywarrior' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'wiStarter' ); ?></p><br/>

            <?php get_search_form(); ?>
<br/>
            <?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>
<br/>
            <div class="widget">
                    <h2 class="widgettitle"><?php _e( 'Most Used Categories', 'wiStarter' ); ?></h2>
                    <ul>
                    <?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
                    </ul>
            </div>
<br/>
            <?php

            $archive_content = '<p>Try looking in the monthly archives.</p>';
            the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
            ?>
<br/>
            <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

    </div><!-- .entry-content -->
</article><!-- #post-0 -->

	
</div> <!-- end of #content //-->

<?php  get_sidebar(); ?>

<?php  get_footer(); ?>