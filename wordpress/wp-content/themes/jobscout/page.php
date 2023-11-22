<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
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

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				/**
                 * Comment Template
                 * 
                 * @hooked jobscout_comment
                */
                do_action( 'jobscout_after_page_content' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
