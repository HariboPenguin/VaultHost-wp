<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<div id="sliderarea">
	<div class="slider-wrapper theme-bar">
		<div id="slider" class="nivoSlider">
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/server-rack-slider-size.jpg" alt="">
			<img src="http://vaulthost.d-tomlinson.co.uk/wp-content/uploads/2013/01/hosting_banner.jpg" alt="">
			<!-- <div id="sliderbar">
				<h2 id="imgtitle">High Performance Hardware</h2>
				<p id="imgdescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies massa nec quam ullamcorper fringilla.</p>
				<a href="#prev" id="sliderprevarrow"></a>
				<a href="#next" id="slidernextarrow"></a>
			</div> -->
		</div>
	</div>
</div>
<div style="clear:both"></div>

<div class="wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>

<!-- Services Section -->
<div id="services">
	<div class="wrapper">
		<div class="sectionheading">
			<h3>Our Services</h3>
			<p>Get up and running within minutes</p>
		</div>
		<div id="serviceboxcontainer">
			<?php $options = get_option('vaulthost_theme_general_options'); ?>
			<?php $webhosting_packages = new WP_Query(array('post_type' => 'webhosting', 'meta_key' => 'package_price', 'orderby' => 'meta_value_num', 'order' => 'ASC')); ?>
			<?php if ($webhosting_packages->have_posts()) { ?>
			<div class="servicebox">
				<img class="alignnone size-full wp-image-100" alt="Web Hosting" src="http://vaulthost.d-tomlinson.co.uk/wp-content/uploads/2013/01/web-hosting-icon.png" />
				<h4 class="serviceboxtitle">Web Hosting</h4>
				<p class="serviceboxdescription"><?php echo $options['webhosting_description']; ?></p>
				<p class="serviceboxprice">From
					<br>
					<?php $counter = 0; ?>
					<?php while ($webhosting_packages->have_posts() && $counter < 1) {
						$webhosting_packages->the_post();
						$webhosting_price = floatval(get_post_meta( $post->ID, 'package_price', true));
					?>
					<span><?php echo '£' . number_format($webhosting_price, 2); ?></span> p/m
					<?php $counter++; ?>
					<?php } ?>
				</p>
				<a class="serviceboxmorebutton" href="<?php echo $options['webhosting_more_info_link']; ?>">Learn More</a>
				<div style="clear: both;"></div>
			</div>
			<?php } ?>
			<?php $vps_packages = new WP_Query(array('post_type' => 'vps', 'meta_key' => 'package_price', 'orderby' => 'meta_value_num', 'order' => 'ASC')); ?>
			<?php if ($vps_packages->have_posts()) { ?>
			<div class="servicebox">
				<img class="alignnone size-full wp-image-100" alt="VPS" src="http://vaulthost.d-tomlinson.co.uk/wp-content/uploads/2013/01/VPS-icon.png" />
				<h4 class="serviceboxtitle">VPS</h4>
				<p class="serviceboxdescription"><?php echo $options['vps_description']; ?></p>
				<p class="serviceboxprice">From
					<br>
					<?php $counter = 0; ?>
					<?php while ($vps_packages->have_posts() && $counter < 1) {
						$vps_packages->the_post();
						$vps_price = floatval(get_post_meta( $post->ID, 'package_price', true));
					?>
					<span><?php echo '£' . number_format($vps_price, 2); ?></span> p/m
					<?php $counter++; ?>
					<?php } ?>
				</p>
				<a class="serviceboxmorebutton" href="<?php echo $options['vps_more_info_link']; ?>">Learn More</a>
				<div style="clear: both;"></div>
			</div>
			<?php } ?>
			<?php $dedicatedservers_packages = new WP_Query(array('post_type' => 'dedicatedservers', 'meta_key' => 'package_price', 'orderby' => 'meta_value_num', 'order' => 'ASC')); ?>
			<?php if ($dedicatedservers_packages->have_posts()) { ?>
			<div class="servicebox">
				<img class="alignnone size-full wp-image-100" alt="Dedicated Servers" src="http://vaulthost.d-tomlinson.co.uk/wp-content/uploads/2013/01/Dedicated-Servers-Icon.png" />
				<h4 class="serviceboxtitle">Dedicated Servers</h4>
				<p class="serviceboxdescription"><?php echo $options['dedicatedservers_description']; ?></p>
				<p class="serviceboxprice">From
					<br>
					<?php $counter = 0; ?>
					<?php while ($dedicatedservers_packages->have_posts() && $counter < 1) {
						$dedicatedservers_packages->the_post();
						$dedicatedservers_price = floatval(get_post_meta( $post->ID, 'package_price', true));
					?>
					<span><?php echo '£' . number_format($dedicatedservers_price, 2); ?></span> p/m
					<?php $counter++; ?>
					<?php } ?>
				</p>
				<a class="serviceboxmorebutton" href="<?php echo $options['dedicatedservers_more_info_link']; ?>">Learn More</a>
				<div style="clear: both;"></div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- End Services Section -->

<!-- Features Section -->
<?php $features = new WP_Query('post_type=features'); ?>
<?php if ($features->have_posts()) { ?>
	<div id="features">
		<div class="wrapper">
			<div class="sectionheading">
				<h3>Our Features</h3>
				<p>What sets us apart from the competition</p>
			</div>
			<div id="featuresboxcontainer">
				<?php
				while ($features->have_posts()) {
					$features->the_post();
					?>
					<div class="featurebox">
						<?php the_post_thumbnail(); ?>
						<h5 class="featureboxtitle"><?php the_title(); ?></h5>
						<p class="featureboxdescription"><?php the_content(); ?></p>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
<?php 
}
?>
<!-- End Features Section -->

<?php get_footer(); ?>