<?php 
/*
* Template Name: Blog
*/
?>

<?php get_header(); ?>

<div class="wrapper">
	<h1>Blog</h1>
	<?php $the_query = new WP_Query('showposts=10'); ?>
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<div class="postdate">
		<p class="day"><?php echo get_the_date('j'); ?></p>
		<p class="month"><?php echo get_the_date('M'); ?></p>
		<p class="year"><?php echo get_the_date('Y'); ?></p>
		<h3><?php the_time(); ?></h3>
	</div>
	<article>
		<h2><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h2>
		<p><?php the_excerpt(__('(more...)')); ?></p>
		<p><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
	</article>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>