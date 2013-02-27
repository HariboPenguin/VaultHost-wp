<?php 
/*
* Template Name: Blog
*/
?>

<?php get_header(); ?>

<div class="wrapper">
	<h1>Blog</h1>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>