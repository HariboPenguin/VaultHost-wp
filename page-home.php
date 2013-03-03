<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<div class="wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>
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

<?php get_footer(); ?>