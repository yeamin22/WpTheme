<?php
/**
 * Displays header site social icons
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */
?>

<?php 
    global $yhpot_theme_option;

    $lenght = count($yhpot_theme_option['yhpot_opt_social_icons']['yhpot_opt_social_name']);
    if(0 < $lenght){

?>
<div class="social-links menu-social-links">
    <?php 
    $social_name =  $yhpot_theme_option['yhpot_opt_social_icons']['yhpot_opt_social_name'];
    $social_link =  $yhpot_theme_option['yhpot_opt_social_icons']['yhpot_opt_social_link'];
    $social_icon =  $yhpot_theme_option['yhpot_opt_social_icons']['yhpot_opt_social_icon'];
    for ($i=0; $i < $lenght ; $i++) {
?>
    <a href="<?php echo $social_link[$i]; ?>" target="blank"  title="<?php echo $social_name[$i]; ?>">
        <i class="<?php echo $social_icon[$i]; ?>"></i>
    </a>
<?php
    }

    ?>
</div>
<?php } ?>