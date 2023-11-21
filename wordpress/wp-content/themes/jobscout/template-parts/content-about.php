<?php

/**
 * Template part for displaying page content in template-no-sidebar.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */

?>

<div class="module-about-content">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="about-content-1">
                <div class="container">
                    <?php dynamic_sidebar('about-content-1');?>
                </div>
            </section>
            <section class="about-content-2">
                <div class="container">
                    <?php dynamic_sidebar('about-content-2');?>
                </div>
            </section>
            <section class="about-content-3">
                <div class="container">
                    <?php dynamic_sidebar('about-content-3');?>
                </div>
            </section>
        </article><!-- #post-<?php the_ID(); ?> -->
</div>