<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

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
			<?php $webhosting_packages = new WP_Query(array('post_type' => 'webhosting', 'orderby' => 'package_price', 'order' => 'DESC')); ?>
			<?php if ($webhosting_packages->have_posts()) { ?>
			<div class="servicebox">
				<img class="alignnone size-full wp-image-100" alt="Web Hosting" src="http://vaulthost.d-tomlinson.co.uk/wp-content/uploads/2013/01/web-hosting-icon.png" />
				<h4 class="serviceboxtitle">Web Hosting</h4>
				<p class="serviceboxdescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna neque, accumsan sit amet tempus.</p>
				<p class="serviceboxprice">From
					<br>
					<?php while ($webhosting_packages->have_posts()) {
						$webhosting_packages->the_post();
					?>
					<span><?php echo '£' . floatval(get_post_meta( $post->ID, 'package_price', true)); ?></span> p/m
					<?php } ?>
				</p>
				<a class="serviceboxmorebutton" href="#">Learn More</a>
				<div style="clear: both;"></div>
			</div>
			<?php } ?>
			<div class="servicebox">
				<img class="alignnone size-full wp-image-100" alt="VPS" src="http://vaulthost.d-tomlinson.co.uk/wp-content/uploads/2013/01/VPS-icon.png" />
				<h4 class="serviceboxtitle">VPS</h4>
				<p class="serviceboxdescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna neque, accumsan sit amet tempus.</p>
				<p class="serviceboxprice">From
					<br>
					<span>£2.99</span> p/m
				</p>
				<a class="serviceboxmorebutton" href="#">Learn More</a>
				<div style="clear: both;"></div>
			</div>
			<div class="servicebox">
				<img class="alignnone size-full wp-image-100" alt="Dedicated Servers" src="http://vaulthost.d-tomlinson.co.uk/wp-content/uploads/2013/01/Dedicated-Servers-Icon.png" />
				<h4 class="serviceboxtitle">Dedicated Servers</h4>
				<p class="serviceboxdescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna neque, accumsan sit amet tempus.</p>
				<p class="serviceboxprice">From
					<br>
					<span>£2.99</span> p/m
				</p>
				<a class="serviceboxmorebutton" href="#">Learn More</a>
				<div style="clear: both;"></div>
			</div>
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