<?php /* Template Name: Testimonials */ ?>

<?php get_header(); ?>

<div class="wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>

<div class="wrapper">
	<div id="testimonials">
		<?php $testimonials = new WP_Query('post_type=testimonials'); ?>
		<?php if ($testimonials->have_posts()) { ?>
			<?php $count = 0 ?>
			<?php while ($testimonials->have_posts()) {
				$testimonials->the_post(); ?>
				<div class="testimonial_bubble <?php echo $side = ($count % 2 == 0) ? 'testimonial_bubble_left' : 'testimonial_bubble_right' ?>">
					<span class='tail <?php echo $side = ($count % 2 == 0) ? 'testimonial_bubble_tail_right' : 'testimonial_bubble_tail_left' ?>'>&nbsp;</span>
					<p class="testimonialtitle"><?php the_title(); ?></p>
					<p class="testimonialdescription"><?php the_content(); ?></p>
				</div>
				<div style="clear:both;"></div>
				<?php $count++; ?>
			<?php } ?>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>