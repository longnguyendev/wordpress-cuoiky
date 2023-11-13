<?php
/*
Template Name: About Template
*/
get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php
    while (have_posts()) : the_post();

      get_template_part('template-parts/content', 'page');

      /**
       * Comment Template
       * 
       * @hooked jobscout_comment
       */
      do_action('jobscout_after_page_content');

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
