<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package c2c
 */

$logo = c2c_get_option('footer_logo');
$slogan = c2c_get_option('footer_slogan');
$copyrights = c2c_get_option('footer_copyrights');

?><footer class="footer">
		<div class="footer__container container-fluid">
			<div class="footer__brand">
				<?php if($logo) : ?>
					<div class="footer__logo">
						<img src="<?= $logo['url'] ?>" alt="" loading="lazy">
					</div>
				<?php endif; ?>
				<?php if($slogan) : ?>
					<div class="footer__slogan">
						<?= $slogan ?>
					</div>
				<?php endif; ?>
				<?php if($copyrights) : ?>
					<div class="footer__copyrights">
						<?= $copyrights ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
				<div class="footer__widgets">
					<?php dynamic_sidebar( 'footer' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</footer>
</div> <?php //end of page container ?>
<?php wp_footer(); ?>
</body>
</html>
