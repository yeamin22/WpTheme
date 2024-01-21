<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */
?>
<section class="section section-inner started-heading no-results not-found">
    <div class="container">       
		 <!-- Heading -->
        <div class="m-titles align-center">           
			<?php if ( is_search() ) : ?>
			<h1 class="page-title m-title scrolla-element-anim-1 scroll-animate" data-animate="active" >
				<?php
				printf(
					/* translators: %s: Search term. */
					esc_html__( 'Results for "%s"', YHPOT_TEXTDOMAIN ),
					'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
			<?php else : ?>
			<h1 class="page-title m-title scrolla-element-anim-1 scroll-animate" data-animate="active"><?php esc_html_e( 'Nothing here', YHPOT_TEXTDOMAIN ); ?>
			</h1>
			<?php endif; ?>
            
        </div>
    </div>
</section>

<div class="section section-inner m-image-large">
    <div class="container">

	<div class="page-content default-max-width">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<?php
			printf(
				'<p>' . wp_kses(
					/* translators: %s: Link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', YHPOT_TEXTDOMAIN ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', YHPOT_TEXTDOMAIN ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', YHPOT_TEXTDOMAIN ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->


	</div>
</div>
