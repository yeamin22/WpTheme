<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */
?>
<?php if ( has_custom_logo() ): ?>
<div class="logo">
    <a href="<?php home_url(); ?>">
        <?php the_custom_logo();?>       
    </a>
</div>
<?php endif;?>