<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage YH_DEV
 * @since YH Dev 1.0
 */

get_header();
?>
<!-- Section Started Heading -->
<section class="section section-inner started-heading">
    <div class="container">
        <!-- Heading -->
        <div class="m-titles align-center">
            <h1 class="m-title splitting-text-anim-1 scroll-animate" data-splitting="words" data-animate="active">
                <?php esc_html_e( 'Nothing here', 'yhsajibdev' ); ?>
            </h1>
        </div>
    </div>
</section>
<div class="section section-inner m-archive">
    <div class="container">
        <div class="error-404 not-found default-max-width">
            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'yhsajibdev' ); ?>
                </p>
                <?php get_search_form(); ?>
            </div><!-- .page-content -->
        </div><!-- .error-404 -->
    </div>
</div>
<?php
get_footer();