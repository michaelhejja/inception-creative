<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inception
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-footer__container Container">
			<div class="site-footer__logo">
			    <a href="http://inceptioncompanies.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_logo.png"></a>
			</div>
			<div class="site-footer__links">
				<a class="site-footer__link" href="<?php echo get_site_url();?>/privacy">Privacy Policy</a>
				<a class="site-footer__link" href="<?php echo get_site_url();?>/terms">Terms & Conditions</a>
			</div>
			<div class="site-footer__social">
				<div class="site-footer__social-link"><i class="fab fa-linkedin"></i></div>
				<div class="site-footer__social-link"><i class="fab fa-instagram"></i></div>
				<div class="site-footer__social-link"><i class="fab fa-facebook-square"></i></div>
				<div class="site-footer__social-link"><i class="fab fa-twitter"></i></div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/main.js'></script>

</body>
</html>
