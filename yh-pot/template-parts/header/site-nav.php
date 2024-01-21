<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

?>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
<!-- menut btn -->
<a href="#" class="menu-btn">
    <span></span>
    <span></span>
</a>
<!-- Menu Full Overlay -->
<div class="menu-full-overlay">
    <div class="menu-full-container">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- menu full -->
                    <?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_class'      => 'menu-full',
							'container_class' => 'menu-full',							
							'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
							'fallback_cb'     => false,
						)
					);
					?>
                    <!-- social -->
                    <?php get_template_part("template-parts/header/site-social"); ?>
                    <div class="v-line-block"><span></span></div>
                </div>
            </div>
        </div>
        <div class="menu-overlay"></div>
    </div>
    <?php
endif;