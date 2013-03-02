<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  
 *
 * @package WordPress
 * @subpackage VaultHost 
 * @since VaultHost 1.0
 */
?>

<footer>
		<div class="wrapper">
			<div id="footerboxabout" class="footerbox">
				<h6>About Us</h6>
				<?php $general_options = get_option('vaulthost_theme_general_options'); ?>
				<p id="aboutdescription"><?php echo $general_options['description'];?></p>
			</div>
			<div id="footerboxnews" class="footerbox">
				<h6>Latest News</h6>
				<ul>
					<?php $the_query = new WP_Query('showposts=3'); ?>
					<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<li><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a><p><?php the_excerpt(__('(more...)'));?></p></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<div id="footerboxtwitter" class="footerbox">
				<h6>Twitter Feed</h6>
				<?php $social_options = get_option('vaulthost_theme_social_options'); ?>
				<div id="twitter_update_list"></div>
				<?php echo $social_options['twitter'] ? '<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>' : ''; ?>
				<?php echo $social_options['twitter'] ? '<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/' . $social_options['twitter'] . '.json?callback=twitterCallback2&count=' . $social_options['tweets_to_display'] . '"></script>' : ''; ?>
			</div>
			<div id="footerboxcontactinfo" class="footerbox">
				<h6>Contact Info</h6>
				<?php $contact_options = get_option('vaulthost_theme_contact_options'); ?>
				<?php echo $contact_options['address'] ? '<p id="address">' . $contact_options['address'] . '</p>' : ''; ?>
				<?php echo $contact_options['phone'] ? '<p id="phone">' . $contact_options['phone'] . '</p>' : ''; ?>
				<?php echo $contact_options['mobile'] ? '<p id="mobile">' . $contact_options['mobile'] . '</p>' : ''; ?>
				<?php echo $contact_options['email'] ? '<p id="email">' . $contact_options['email'] . '</p>' : ''; ?>
				<?php $social_options = get_option('vaulthost_theme_social_options'); ?>
				<?php echo $social_options['facebook'] ? '<a href="https://www.facebook.com/' . $social_options['facebook'] . '">Facebook</a>' : ''; ?>
				<?php echo $social_options['twitter'] ? '<a href="https://twitter.com/' . $social_options['twitter'] . '">Twitter</a>' : ''; ?>
				<?php echo $social_options['googleplus'] ? '<a href="https://plus.google.com/' . $social_options['googleplus'] . '">Google+</a>' : ''; ?>
				<?php echo $social_options['youtube'] ? '<a href="https://www.youtube.com/' . $social_options['youtube'] . '">YouTube</a>' : ''; ?>
			</div>
		</div>
	</footer>
	<div id="bottombar">
		<div class="wrapper">
			<p id="copyright">&copy; Copyright <?php echo date(Y); ?> <?php bloginfo( 'name' ); ?></p>
			<div id="bottomlinks">
				<a href="#">Terms & Conditions</a>|<a href="#">Privacy Policy</a>
			</div>
		</div>
	</div>


<?php wp_footer(); ?>

</body>
</html>
