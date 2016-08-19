<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simfolio
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <p>Reach me at</p>
        <div class="socialmedia">
            <a href="http://www.twitter.com" class="tw"></a>
            <a href="http://www.facebook.com" class="fb"></a>
            <a href="http://www.instagram.com" class="insta"></a>
            <a href="http://www.behance.com" class="behance"></a>
        </div>
        
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simfolio' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'simfolio' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'simfolio' ), 'simfolio', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
