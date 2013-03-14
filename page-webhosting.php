<?php /* Template Name: Web Hosting */ ?>

<?php get_header(); ?>

<div class="wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>


<!-- Package Pricing Table -->
<div class="packages">
	<div class="wrapper">
		<?php $webhosting_packages = new WP_Query(array('post_type' => 'webhosting', 'meta_key' => 'package_price', 'orderby' => 'meta_value_num', 'order' => 'ASC')); ?>
		<?php if ($webhosting_packages->have_posts()) { ?>
			<div class="option-descriptions">
				<div class="pricing-option-desc storage-option-desc"><p>Storage Space:</p></div>
				<div class="pricing-option-desc bandwidth-option-desc"><p>Bandwidth:</p></div>
				<div class="pricing-option-desc domains-option-desc"><p>Domains:</p></div>
				<div class="pricing-option-desc subdomains-option-desc"><p>Subdomains:</p></div>
				<div class="pricing-option-desc emailaccounts-option-desc"><p>Email Accounts:</p></div>
				<div class="pricing-option-desc dbs-option-desc"><p>MySQL Databases:</p></div>
				<div class="pricing-option-desc ftpaccounts-option-desc"><p>FTP Accounts:</p></div>
			</div>
			<?php while ($webhosting_packages->have_posts()) {
				$webhosting_packages->the_post(); ?>
				<div class="package">
					<div class="package-header">
						<h4 class="package-title"><?php echo the_title(); ?></h4>
						<p class="package-price"><?php echo '£' . number_format(floatval(get_post_meta( $post->ID, 'package_price', true)),2); ?></p>
					</div>
					<div class="package-details">
						<div class="pricing-option storage-option"><?php echo intval(get_post_meta( $post->ID, 'package_storage', true)) . 'GB'; ?></div>
						<div class="pricing-option bandwidth-option"><?php echo intval(get_post_meta( $post->ID, 'package_bandwidth', true)) . 'GB'; ?></div>
						<div class="pricing-option domains-option"><?php echo intval(get_post_meta( $post->ID, 'package_domains', true)); ?></div>
						<div class="pricing-option subdomains-option"><?php echo intval(get_post_meta( $post->ID, 'package_subdomains', true)); ?></div>
						<div class="pricing-option emailaccounts-option"><?php echo intval(get_post_meta( $post->ID, 'package_emailaccounts', true)); ?></div>
						<div class="pricing-option dbs-option"><?php echo intval(get_post_meta( $post->ID, 'package_dbs', true)); ?></div>
						<div class="pricing-option ftpaccounts-option"><?php echo intval(get_post_meta( $post->ID, 'package_ftpaccounts', true)); ?></div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>


<?php get_footer(); ?>