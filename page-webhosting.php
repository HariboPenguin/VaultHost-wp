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

			<?php while ($webhosting_packages->have_posts()) {
				$webhosting_packages->the_post(); ?>
				<div class="option-descriptions">
					<div class="storage-option-desc"><p>Storage Space:</p></div>
					<div class="bandwidth-option-desc"><p>Bandwidth:</p></div>
					<div class="domains-option-desc"><p>Domains:</p></div>
					<div class="subdomains-option-desc"><p>Subdomains:</p></div>
					<div class="emailaccounts-option-desc"><p>Email Accounts:</p></div>
					<div class="dbs-option-desc"><p>MySQL Databases:</p></div>
					<div class="ftpaccounts-option-desc"><p>FTP Accounts:</p></div>
				</div>
				<div class="package">
					<div class="package-header">
						<h4 class="package-title"><?php echo the_title(); ?></h4>
						<p class="package-price"><?php echo '£' . floatval(get_post_meta( $post->ID, 'package_price', true)); ?></p>
					</div>
					<div class="package-details">
						<div class="pricing-option storage-option"><?php echo intval(get_post_meta( $package->ID, 'package_storage', true)) . 'GB'; ?></div>
						<div class="pricing-option bandwidth-option"><?php echo intval(get_post_meta( $package->ID, 'package_bandwidth', true)) . 'GB'; ?></div>
						<div class="pricing-option domains-option"><?php echo intval(get_post_meta( $package->ID, 'package_domains', true)); ?></div>
						<div class="pricing-option subdomains-option"><?php echo intval(get_post_meta( $package->ID, 'package_subdomains', true)); ?></div>
						<div class="pricing-option emailaccounts-option"><?php echo intval(get_post_meta( $package->ID, 'package_emailaccounts', true)); ?></div>
						<div class="pricing-option dbs-option"><?php echo intval(get_post_meta( $package->ID, 'package_dbs', true)); ?></div>
						<div class="pricing-option ftpaccounts-option"><?php echo intval(get_post_meta( $package->ID, 'package_ftpaccounts', true)); ?></div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>


<?php get_footer(); ?>