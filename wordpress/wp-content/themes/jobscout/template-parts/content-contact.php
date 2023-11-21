<?php

/**
 * Template part for displaying page content in template-no-sidebar.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="module-contact-content">
        <section class="contact-content-1">
            <div class="container">
                <?php dynamic_sidebar('contact-content-1'); ?>
            </div>
        </section>
        <section class="contact-content-2">
            <div class="container">
                <?php dynamic_sidebar('contact-content-2'); ?>
            </div>
        </section>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->