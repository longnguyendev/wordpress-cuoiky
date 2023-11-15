<?php
/*
Template Name: No Sidebar Template
*/
get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php
    $page_slug = get_post_field('post_name', get_post());
    while (have_posts()) : the_post();

      get_template_part('template-parts/content', $page_slug);

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
