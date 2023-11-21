<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */
$pg = 1;
$perPage = 8;
$total_page = 1;
if (isset($_GET['pg'])) {
	$pg = $_GET['pg'];
}

$post_counts = wp_count_posts();

// echo 'Total Posts: ' . $post_counts->publish;

$total_page = ceil((int)$post_counts->publish / $perPage);



get_header(); ?>

<?php
// Đặt slug của trang
$page_slug = get_post_field('post_name', get_queried_object());

// Lấy thông tin trang dựa trên slug
$page = get_page_by_path($page_slug);

// Kiểm tra xem trang có tồn tại không và lấy "excerpt" và featured image nếu có
if ($page) {
	// Lấy "excerpt"
	$page_excerpt = get_post_field('post_excerpt', $page->ID);

	// Lấy URL hình đại diện
	$page_featured_image_url = get_the_post_thumbnail_url($page->ID, 'full');

	// Kiểm tra và hiển thị "excerpt"
	// if (!empty($page_excerpt)) {
	// 	echo $page_excerpt;
	// }

	// Kiểm tra và hiển thị hình đại diện nếu có
	if (!empty($page_featured_image_url)) {
		echo '<div style="background-image: url(' . esc_url($page_featured_image_url) . '); height: 300px; width: 100%; ; background-size: cover; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center;"><h2 class="text-white">' . $page_excerpt . '</h2></div>';
	}
}

?>

<div id="primary" class="content-area custom">


	<?php
	/**
	 * Before Posts hook
	 */
	do_action('jobscout_before_posts_content');
	?>
	<div class="container">
		<main id="main" class="site-main">
			<div class="row module-5 p-5">
				<h2 class="text-center p-0 m-0">NEWEST BLOG ENTRIES</h2>
				<?php
				$args = array(
					'post_type'           => 'post',
					'post_status'         => 'publish',
					'posts_per_page'      => ($perPage * $pg),
					'ignore_sticky_posts' => true
				);

				$qry = new WP_Query($args);
				if ($qry->have_posts()) :

					/* Start the Loop */
					while ($qry->have_posts()) : $qry->the_post();

						/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
						get_template_part('template-parts/content', get_post_format());

					endwhile;

				else :

					get_template_part('template-parts/content', 'none');

				endif; ?>
				<?php if ($pg < $total_page) { ?>
					<div class="d-flex justify-content-center job_listings">
						<a class="load_more_jobs mt-5 rounded-2" href="/blog/?pg=<?php echo ($pg + 1) ?>">Load More</a>
					</div>
				<?php } ?>
			</div>



		</main><!-- #main -->
	</div>


	<?php
	/**
	 * After Posts hook
	 * @hooked jobscout_navigation - 15
	 */
	// do_action('jobscout_after_posts_content');
	?>

</div><!-- #primary -->

<?php

get_footer();
