<?php /* Template Name: Dedicated Servers */ ?>

<?php get_header(); ?>

<div class="wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>


<!-- Package Pricing Table -->
<div class="packages">
	<div class="wrapper">
		<?php $dedicatedservers_packages = new WP_Query(array('post_type' => 'dedicatedservers', 'meta_key' => 'package_price', 'orderby' => 'meta_value_num', 'order' => 'ASC')); ?>
		<?php if ($dedicatedservers_packages->have_posts()) { ?>
			<div class="option-descriptions">
				<div class="pricing-option-desc cpu-option-desc"><p>CPU:</p></div>
				<div class="pricing-option-desc ram-option-desc gray"><p>RAM:</p></div>
				<div class="pricing-option-desc storage-option-desc gray"><p>Storage Space:</p></div>
				<div class="pricing-option-desc bandwidth-option-desc"><p>Bandwidth:</p></div>
				<div class="pricing-option-desc ipv4-option-desc gray"><p>IPv4 Addresses:</p></div>
				<div class="pricing-option-desc ipv6-option-desc"><p>IPv6 Addresses:</p></div>
				<div class="pricing-option-desc network-option-desc gray"><p>Network Speed:</p></div>
			</div>
			<?php while ($dedicatedservers_packages->have_posts()) {
				$dedicatedservers_packages->the_post(); ?>
				<div class="package">
					<div class="package-header">
						<h4 class="package-title"><?php echo the_title(); ?></h4>
						<p class="package-price"><?php echo '£' . number_format(floatval(get_post_meta( $post->ID, 'package_price', true)),2); ?></p>
					</div>
					<div class="package-details">
						<div class="pricing-option cpu-option"><?php echo esc_html(get_post_meta( $post->ID, 'package_cpu', true)); ?></div>
						<div class="pricing-option ram-option gray"><?php echo intval(get_post_meta( $post->ID, 'package_ram', true)) . 'MB'; ?></div>
						<div class="pricing-option storage-option gray"><?php echo intval(get_post_meta( $post->ID, 'package_storage', true)) . 'GB'; ?></div>
						<div class="pricing-option bandwidth-option"><?php echo intval(get_post_meta( $post->ID, 'package_bandwidth', true)) . 'GB'; ?></div>
						<div class="pricing-option ipv4-option gray"><?php echo intval(get_post_meta( $post->ID, 'package_ipv4', true)); ?></div>
						<div class="pricing-option ipv6-option"><?php echo intval(get_post_meta( $post->ID, 'package_ipv6', true)); ?></div>
						<div class="pricing-option network-option gray"><?php echo intval(get_post_meta( $post->ID, 'package_network', true)) . 'Mbps'; ?></div>
						<div class="pricing-option order-option">Order Now</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>