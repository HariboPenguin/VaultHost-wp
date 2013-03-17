<?php 
/*
* Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="blog-wrapper" class="wrapper">
	<h1>Blog</h1>
	<?php $the_query = new WP_Query('showposts=10'); ?>
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<div class="postdate">
		<p class="day"><?php echo get_the_date('j'); ?></p>
		<p class="month"><?php echo get_the_date('M'); ?></p>
		<p class="year"><?php echo get_the_date('Y'); ?></p>
	</div>
	<article>
		<div class="articleheader">
			<h2 class="posttitle"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h2>
			<p class="posttime"><?php the_time('jS M Y, G:i'); ?></p>
			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
		<div class="articlecontent">
			<p><?php the_excerpt(__('(more...)')); ?></p>
		</div>
		<div class="articlemeta">
			<p><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
		</div>
	</article>
	<div style="clear:both;"></div>
	<?php endwhile; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>