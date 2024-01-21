<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

$yhsajibdev_comment_count = get_comments_number();
?>
<!-- Comments -->
<div class="comments-post scrolla-element-anim-1 scroll-animate" data-animate="active">
    <?php if ( have_comments() ): ?>
    <div class="section__comments">
        <div class="m-titles">
            <div class="m-title align-left">
                <?php
                    if ( '1' === $yhsajibdev_comment_count ) {
                        esc_html_e( "1 Comment", YHPOT_TEXTDOMAIN );
                    } else {
                        printf(
                            /* translators: %s: Comment count number. */
                            esc_html( _nx( '%s Comment', '%s Comments', $yhsajibdev_comment_count, 'Comments title', 'twentytwentyone' ) ),
                            esc_html( number_format_i18n( $yhsajibdev_comment_count ) )
                        );
                    }
                ?>
            </div>
        </div>

        <ul class="comments">
            <?php
                wp_list_comments(
                    [
                        'callback' => 'yhsajibdev_comment_list_callback',
                    ]
                );
                ?>
        </ul>
        <?php endif; ?>
        <div class="form-comment">
            <div class="comment-respond">
                <?php yhsajibdev_comment_form();?>
            </div>
        </div>
    </div>
</div>