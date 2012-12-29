<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

     <footer id="caboose">
         <p>
            <?php echo wiStarter_copyright(); ?>
            Designed by <a href="<?php
$my_theme = wp_get_theme();
echo $my_theme->get( 'AuthorURI' ); ?>">Warrior Icarus</a> | 
            Proudly powered by <a href="http://wordpress.org">WordPress</a> | 
            Subscribe to <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> | 
            and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
        </p>
     </footer>					


          </div> <!-- end of #wrapper //-->

    
    
    <?php wp_footer(); ?> <!--wordpress footer tag-->
    </body>

</html>
