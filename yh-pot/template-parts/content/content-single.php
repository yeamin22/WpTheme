<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

?>

<!-- Section Started Heading -->
<section class="section section-inner started-heading">
    <div class="container">
        <!-- Heading -->
        <div class="m-titles align-center">
            <div class="m-category scrolla-element-anim-1 scroll-animate" data-animate="active">
                <?php the_category( "," );?> / <?php the_date();?> / <?php _e( "by ", 'yhsajibdev' );
the_author()?>
            </div>
            <h1 class="m-title scrolla-element-anim-1 scroll-animate" data-animate="active">
                <?php the_title();?>
            </h1>
        </div>
    </div>
</section>


<!-- Single Post Image -->
<div class="section section-inner m-image-large">
    <div class="container">
        <div class="v-line-right v-line-top">
            <div class="v-line-block"><span></span></div>
        </div>
    </div>
    <div class="image">
        <div class="img scrolla-element-anim-1 scroll-animate" data-animate="active"
            style="background-image: url(<?php the_post_thumbnail_url();?>);"></div>
    </div>
</div>


<!-- Section - Blog -->
<section class="section section-inner m-archive">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 offset-1">

                <!-- content -->
                <div class="description">
                    <div class="post-content scrolla-element-anim-1 scroll-animate" data-animate="active">
                        <?php the_content();?>
                        <span class="tags-links">
                            <?php
                                the_tags( "<span>Tags:</span>" );
                            ?>
                        </span>
                    </div>
                </div>
                <!-- Comments -->
                <?php
					// If comments are open or there is at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>
            </div>
        </div>

        <div class="v-line-left v-line-top">
            <div class="v-line-block"><span></span></div>
        </div>

    </div>
</section>