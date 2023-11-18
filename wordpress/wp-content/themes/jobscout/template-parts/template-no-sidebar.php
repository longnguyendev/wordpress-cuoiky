<?php
/*
Template Name: No Sidebar Template
*/
get_header(); ?>
<script>
   // Lấy phần tử <body>
    var bodyElement = document.body;

    // Kiểm tra xem class "rightsidebar" có tồn tại không
    var hasRightSidebarClass = bodyElement.classList.contains("rightsidebar");

    // Nếu class tồn tại, loại bỏ nó
    if (hasRightSidebarClass) {
        bodyElement.classList.remove("rightsidebar");
        console.log("Removed 'rightsidebar' class");
    }
</script>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="module-about-contact-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
      <div class="banner-overlay"></div>
      <div class="banner-caption">
        <h1><?php echo get_the_excerpt();?></h1>
      </div>
    </div>
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
