<?php
/* Modified the comment list  */
function yhsajibdev_comment_list_callback( $comment, $args, $depth ) {
    ?>
<li <?php comment_class( 'comment-item' );?> id="comment-<?php comment_ID();?>">
    <div class="comment comment-box">
        <img src="<?php echo get_avatar_url( $comment ) ?>" class="avatar" alt="">    
        <div class="comment-box__body">
            <div class="content-caption post-content description">
                <h5 class="comment-box__details">
                    <?php echo ucfirst( get_comment_author() );?><span><?php echo get_comment_date(); ?></span>
                </h5>
                <p> <?php comment_text();?></p>
                <?php if ( $comment->comment_approved == '0' ): ?>
                    <em><?php _e( 'Your comment is awaiting moderation.', YHPOT_TEXTDOMAIN );?></em>     
                <br/>
                <?php endif;?>
            </div>
        </div>
        <div class="comment-footer">
            <?php comment_reply_link( array_merge( $args, [ 'depth' => $depth, 'max_depth' => $args['max_depth'] ] ) );?>
        </div>
    </div>
</li>
<?php
}

/* Modified the default comment form */
function yhsajibdev_comment_form() {
    $args = [];
    $args['fields']['url'] = '';
    $args['fields']['cookies'] = '';
    $args['comment_field'] = '<div class="group-row">
                                    <div class="group">
                                        <textarea class="textarea" name="comment" rows="3" placeholder="Comment"></textarea>
                                    </div>
                                </div>';
    $args['fields']['author'] = '<div class="group-row">
                                    <div class="group">
                                        <input type="text" name="author" class="input" placeholder="Name">
                                    </div>';
    $args['fields']['email'] = '<div class="group">
                                <input type="text" name="email" class="input" placeholder="Email">
                                </div>
                                </div>';

$args['comment_notes_before'] = '';
$args['title_reply_before'] =' <div class="m-titles"><div class="m-title align-left">';
$args['title_reply'] = __("Leave A Comment", YHPOT_TEXTDOMAIN);
$args['title_reply_after'] ='</div></div>';
$args['label_submit'] = __("Submit", YHPOT_TEXTDOMAIN);
    comment_form( $args );
}