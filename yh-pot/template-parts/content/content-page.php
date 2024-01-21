<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */
?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="section section-inner started-heading">
    <div class="container">        <!-- Heading -->
        <div class="m-titles align-center">
            <h1 class="m-title scrolla-element-anim-1 scroll-animate" data-animate="active">
                <?php the_title();?>
            </h1>
        </div>
    </div>
</section>

<div class="section section-inner m-archive">
    <div class="container">
		<?php the_content(); ?>
	</div>
</div>
</div><!-- #post-<?php the_ID(); ?> -->
