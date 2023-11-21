<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
$job_salary   = get_post_meta( get_the_ID(), '_job_salary', true );
$job_featured = get_post_meta( get_the_ID(), '_featured', true );
$company_name = get_post_meta( get_the_ID(), '_company_name', true );
$job_posted   = get_post_meta( get_the_ID(), '_date', true );
$post_custom = get_post_custom( get_the_ID() );

?>

	<article <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">

		<div class="top">
			<figure class="company-logo">
				<?php the_company_logo( 'thumbnail' ); ?>
			</figure>

			<div class="job-title-wrap">
				
				<h2 class="entry-title">
					<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
				</h2>

				<div class="entry-posted-date pt-1">Created:
					<?php
					$job_posted_date = get_the_date();
					echo date('M j, Y', strtotime($job_posted_date));
					?>
				</div>
				<div class="row infomation mt-0 ms-0 me-0">
					<div class="col-md-4 my-0 job-types px-0">
						<?php 
							if ( get_option( 'job_manager_enable_types' ) ) { 
								$types = wpjm_get_the_job_types(); 
								if ( ! empty( $types ) ) : foreach ( $types as $jobtype ) : ?>
									<p class="border-end my-0 <?php echo esc_attr( sanitize_title( $jobtype->slug ) ); ?>"><?php echo esc_html( $jobtype->name ); ?></p>
								<?php endforeach; endif; 
							}
							do_action( 'job_listing_meta_end' ); 			
						?>	
					</div>
					<div class="col-md-4 companyname px-0">
						<?php if( $company_name ){ ?>
							<div class="company-name border-end mt-0">
								<?php the_company_name(); ?>
							</div>
						<?php } ?>
					</div>
					<div class="col-md-4 px-0">
						<div class="company-address mb-0">
							<?php the_job_location( true ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<ul class="job-excerpt ms-0 ps-4 mt-2">
				<?php 
				if( $post_custom ) { // kiểm tra xem nó có dữ liệu hay không
					// Duyệt qua mảng các trường tùy chỉnh và in ra giá trị
					foreach ($post_custom as $key => $values) {
						// Kiểm tra nếu trường không phải là trường thông thường (title, content, date, v.v.)
						if (strpos($key, '_') !== 0) {
						?>
							<li>
								<?php							
								// $values là mảng chứa các giá trị của trường tùy chỉnh
								foreach ($values as $value) {
									echo '<p class = "detail-excerpt">' . esc_html($value) . '</p>';
								} 
								?>
							</li>
						<?php
						}
					}
				}
				?>
		</ul>	
		<?php if( $job_featured ){ ?>
			<div class="featured-label"><?php esc_html_e( 'Featured', 'jobscout' ); ?></div>
		<?php } ?>

	</article>	


