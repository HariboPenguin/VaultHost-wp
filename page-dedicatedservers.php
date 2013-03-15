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
			<?php while ($dedicatedservers_packages->have_posts()) {
				$dedicatedservers_packages->the_post(); ?>
				<div class="package">
					<dl class="package-header">
						<dd class="package-title"><?php echo the_title(); ?></dd>
						<dd class="package-price"><?php echo '£' . number_format(floatval(get_post_meta( $post->ID, 'package_price', true)),2); ?></dd>
					</dl>
					<dl class="package-options">
						<dd class="package-option">
							<div class="cpu-option"><span class="highlight"><?php echo esc_html(get_post_meta( $post->ID, 'package_cpu', true)); ?></span> CPU</div>
						</dd>
						<dd class="package-option">
							<div class="ram-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_ram', true)) . 'MB'; ?></span> RAM</div>
						</dd>
						<dd class="package-option">
							<div class="storage-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_storage', true)) . 'GB'; ?></span> Storage</div>
						</dd>
						<dd class="package-option">
							<div class="bandwidth-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_bandwidth', true)) . 'GB'; ?></span> Bandwidth</div>
						</dd>
						<dd class="package-option">
							<div class="ipv4-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_ipv4', true)); ?></span> IPv4 Addresses</div>
						</dd>
						<dd class="package-option">
							<div class="ipv6-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_ipv6', true)); ?></span> IPv6 Addresses</div>
						</dd>
						<dd class="package-option">
							<div class="network-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_network', true)) . 'Mbps'; ?></span> Link Speed</div>
						</dd>
						<dd class="package-buy">
							<a href="#" class="package-order-button">Order Now</a>
						</dd>
					</dl>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>