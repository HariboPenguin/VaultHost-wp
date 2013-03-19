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
				<?php echo $general_options['footer_logourl'] ? '<img id="footer_about_logo" src="' . $general_options['footer_logourl'] . '">' : ''; ?>
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
				<div class="contactoption">
					<?php echo $contact_options['address'] ? '<i class="icon-map-marker"></i><p id="address">' . $contact_options['address'] . '</p>' : ''; ?>
				</div>
				<div style="clear:both"></div>
				<div class="contactoption">
					<?php echo $contact_options['phone'] ? '<i class="icon-phone"></i><p id="phone"><a href="tel:' . $contact_options['phone'] . '">' . $contact_options['phone'] . '</a></p>' : ''; ?>
					<?php echo $contact_options['mobile'] ? '<p id="mobile"><a href="tel:' . $contact_options['mobile'] . '">' . $contact_options['mobile'] . '</a></p>' : ''; ?>
				</div>
				<div style="clear:both"></div>
				<div class="contactoption">
					<?php echo $contact_options['email'] ? '<i class="icon-envelope-alt"></i><p id="email" class="contact-center"><a href="mailto:' . $contact_options['email'] . '">' . $contact_options['email'] . '</a></p>' : ''; ?>
				</div>
				<div style="clear:both"></div>
				<div class="contactoption">
				<?php $social_options = get_option('vaulthost_theme_social_options'); ?>
					<?php echo $social_options['facebook'] ? '<i class="icon-facebook"></i><p class="contact-center"><a href="https://www.facebook.com/' . $social_options['facebook'] . '">/' . $social_options['facebook'] . '</a></p>' : ''; ?>
				</div>
				<div style="clear:both"></div>
				<div class="contactoption">
					<?php echo $social_options['twitter'] ? '<i class="icon-twitter"></i><p class="contact-center"><a href="https://twitter.com/' . $social_options['twitter'] . '">@' . $social_options['twitter'] . '</a></p>' : ''; ?>
				</div>
				<div style="clear:both"></div>
				<div class="contactoption">
					<?php echo $social_options['googleplus'] ? '<i class="icon-google-plus"></i><p class="contact-center"><a href="https://plus.google.com/' . $social_options['googleplus'] . '">Google+</a></p>' : ''; ?>
				</div>
				<div style="clear:both"></div>
				<div class="contactoption">
					<?php echo $social_options['youtube'] ? '<p class="contact-center"><a href="https://www.youtube.com/' . $social_options['youtube'] . '">YouTube</a></p>' : ''; ?>
				</div>
				<div style="clear:both"></div>
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
