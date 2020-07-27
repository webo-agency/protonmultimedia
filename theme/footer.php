<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Swistak_Theme
 */

$footer_phone = get_field('footer_phone', 'option');
if( $footer_phone ): 
    $footer_phone_url = $footer_phone['url'];
    $footer_phone_title = $footer_phone['title'];
    $footer_phone_target = $footer_phone['target'] ? $footer_phone['target'] : '_self';
endif;
$footer_email = get_field('footer_e-mail', 'option');
if( $footer_email ): 
    $footer_email_url = $footer_email['url'];
    $footer_email_title = $footer_email['title'];
    $footer_email_target = $footer_email['target'] ? $footer_email['target'] : '_self';
endif;

?>

	</div>

	<footer id="kontakt" class="site-footer ks-footer ks-fade">
		
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
