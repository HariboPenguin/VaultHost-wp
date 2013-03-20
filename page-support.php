<?php /* Template Name: Support */ ?>

<?php get_header(); ?>

<div class="wrapper">
	<h1><?php the_title(); ?></h1>
	<div id="supportpagecontent">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</div>
	<div id="supportcontactform">
		<?php echo do_shortcode( '[contact-form-7 id="81" title="Contact Form"]' );?>
	</div>
</div>

<?php get_footer(); ?>