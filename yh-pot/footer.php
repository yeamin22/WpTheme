<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

?>
</div>

<!-- Footer -->
<div class="footer">
    <div class="footer__builder">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <?php get_template_part("template-parts/header/site-social"); ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="copyright-text align-center">
                       <?php echo Redux::get_option( 'yhpot_theme_option', 'footer_copy_right_opt' ); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="copyright-text align-right">
                    <?php echo Redux::get_option( 'yhpot_theme_option', 'footer_developby_opt' ); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- cursor -->
<div class="cursor"></div>
<?php wp_footer(); ?>

</body>

</html>