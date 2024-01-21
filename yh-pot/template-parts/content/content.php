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
<article id="post-<?php the_ID();?>"
    <?php post_class( ['archive-item', 'scrolla-element-anim-1', ' scroll-animate'] );?> data-animate="active">
    <div class="image">
        <a href="<?php the_permalink();?>">
            <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" loading="lazy">
        </a>
    </div>
    <div class="desc">
        <div class="category lui-subtitle">
            <span><?php the_date();?></span>
        </div>
        <h5 class="lui-title">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </h5>
        </h5>
        <div class="lui-text">
            <?php
			if ( !has_excerpt() ) {
				printf( "<p>%s</p>", wp_trim_words( get_the_content(), 20, '…' ) );
				?>
				<div class='readmore'><a href='<?php the_permalink();?>' class='lnk'><?php _e( "Read more", 'yhdev' )?></a>
				</div>
            <?php
				}else{
					the_excerpt();
				}
			?>
        </div>
    </div>
</article><!-- #post-<?php the_ID();?> -->