<?php /* Template Name: VPS */ ?>

<?php get_header(); ?>

<div class="wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>



<?php get_footer(); ?>