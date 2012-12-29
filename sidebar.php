<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id = "sidebar">
    
    <div id="sidebar1">
        <?php if ( ! dynamic_sidebar( 'sideTop' ) ) : ?>

                <aside id="archives" class="widget">
                        <h3 class="widget-title"><?php _e( 'Archives', 'WI_Starter' ); ?></h3>
                        <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                        </ul>
                </aside>

                <aside id="meta" class="widget">
                        <h3 class="widget-title"><?php _e( 'Meta', 'WI_Starter' ); ?></h3>
                        <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                        </ul>
                </aside>

        <?php endif; // end sidebar 1 widget area ?>
</div>

    <div id="sidebar2">

     <?php if ( ! dynamic_sidebar( 'sideBottom' ) ) : ?>

        <aside id="archives" class="widget">
                <h3 class="widget-title"><?php _e( 'Archives', 'WI_Starter' ); ?></h3>
                <ul>
                        <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                </ul>
        </aside>

        <aside id="meta" class="widget">
                <h3 class="widget-title"><?php _e( 'Meta', 'WI_Starter' ); ?></h3>
                <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                </ul>
        </aside>

    <?php endif; // end sidebar 2 widget area ?>
</div>
    
</div>
