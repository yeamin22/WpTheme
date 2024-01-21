<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

get_header();

if ( have_posts() ) {
	?>

<section class="section section-inner started-heading">
    <div class="container">        <!-- Heading -->
        <div class="m-titles align-center">
            <h1 class="m-title scrolla-element-anim-1 scroll-animate" data-animate="active">
			<?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'Results for "%s"', 'yhsajibdev' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?>
            </h1>
        </div>
    </div>
</section>


    <div class="section section-inner m-archive">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="search-result-count default-max-width">
                <?php
                printf(
                    esc_html(
                        /* translators: %d: The number of search results. */
                        _n(
                            'We found %d result for your search.',
                            'We found %d results for your search.',
                            (int) $wp_query->found_posts,
                            'yhsajibdev'
                        )
                    ),
                    (int) $wp_query->found_posts
                );
                ?>
				<?php 	// Start the Loop.
					while ( have_posts() ) {
						the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content/content');
					} // End the loop.

					// Previous/next page navigation.
					the_posts_pagination();

					// If no content, include the "No posts found" template.
				} else {
					get_template_part( 'template-parts/content/content-none' );
				}
				?>
				
            </div><!-- .search-result-count -->
            </div>
        </div>
    </div>
    </div>

	<?php
get_footer();
