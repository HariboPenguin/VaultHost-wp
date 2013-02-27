<?php 
/*
* Template Name: Blog
*/
?>

<?php get_header(); ?>

<div class="wrapper">
	<h1>Blog</h1>
	<?php $the_query = new WP_Query('showposts=3'); ?>
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<article>
		<h3><?php echo get_the_date(); ?></h3>
		<h3><?php the_time(); ?></h3>
		<h2><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h2>
		<p><?php the_excerpt(__('(more...)')); ?></p>
	</article>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>