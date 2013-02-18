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
			</div>
			<div id="footerboxtwitter" class="footerbox">
				<h6>Twitter Feed</h6>
			</div>
			<div id="footerboxcontactinfo" class="footerbox">
				<h6>Contact Info</h6>
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
