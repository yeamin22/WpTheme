<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo("charset"); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <?php wp_head(); ?>
    <!-- Fonts -->
    <link rel="stylesheet"
        href="../../css?family=Jost%3A0%2C100%3B0%2C200%3B0%2C300%3B0%2C400%3B0%2C500%3B0%2C600%3B0%2C700%3B0%2C800%3B0%2C900%3B1%2C100%3B1%2C200%3B1%2C300%3B1%2C400%3B1%2C500%3B1%2C600%3B1%2C700%3B1%2C800%3B1%2C900%7CCaveat%3A400%3B500%3B600%3B700&#038;display=swap"
        type="text/css" media="all">
    <link rel="stylesheet"
        href="../../css-1?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto"
        type="text/css" media="all">
</head>
<body <?php body_class(['light-skin','home']) ?> >
<?php wp_body_open(); ?>
    <div class="container-page">

        <!-- Preloader -->

        <?php //get_template_part('template-parts/header/site','preloader') ?>

        <!-- Header -->
        <header class="header">
            <div class="header__builder">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <!-- logo -->
                        <?php get_template_part("template-parts/header/site-branding") ?>

                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 align-right">

                        <!-- switcher btn -->
                        <?php get_template_part("template-parts/header/site-switcher") ?>
                        <!-- menu -->
                        <?php get_template_part("template-parts/header/site-nav") ?>

                    </div>
                </div>
            </div>
        </header>

        <!-- Wrapper -->
        <div class="wrapper">