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
				<div class="package">
					<dl class="package-header">
						<dd class="package-title"><?php echo the_title(); ?></dd>
						<dd class="package-price"><?php echo '£' . number_format(floatval(get_post_meta( $post->ID, 'package_price', true)),2); ?></dd>
					</dl>
					<dl class="package-options">
						<dd class="package-option">
							<div class="storage-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_storage', true)) . 'GB'; ?></span> Storage</div>
						</dd>
						<dd class="package-option">
							<div class="bandwidth-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_bandwidth', true)) . 'GB'; ?></span> Bandwidth</div>
						</dd>
						<dd class="package-option">
							<div class="domains-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_domains', true)); ?></span> Domains</div>
						</dd>
						<dd class="package-option">
							<div class="subdomains-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_subdomains', true)); ?></span> Subdomains</div>
						</dd>
						<dd class="package-option">
							<div class="emailaccounts-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_emailaccounts', true)); ?></span> Email Accounts</div>
						</dd>
						<dd class="package-option">
							<div class="dbs-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_dbs', true)); ?></span> MySQL Databases</div>
						</dd>
						<dd class="package-option">
							<div class="ftpaccounts-option"><span class="highlight"><?php echo intval(get_post_meta( $post->ID, 'package_ftpaccounts', true)); ?></span> FTP Accounts</div>
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