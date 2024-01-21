<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

get_header();?>

<?php
if ( have_posts() ) {
?>
<!-- Section Started Heading -->
<section class="section section-inner started-heading">
    <div class="container">
        <!-- Heading -->
        <div class="m-titles align-center">
            <h1 class="m-title splitting-text-anim-1 scroll-animate" data-splitting="words" data-animate="active">
                <span> Our Blogs </span>
            </h1>
            <div class="m-subtitle splitting-text-anim-1 scroll-animate" data-splitting="words" data-animate="active">
                <span> Recent Articles </span>
            </div>
        </div>

    </div>
</section>
<div class="section section-inner m-archive">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <!-- Blog Items -->
                <div class="articles-container">
                    <?php               
                  // Load posts loop.   
               
                      while(have_posts()):
                        the_post();
                        get_template_part("template-parts/content/content");
                      endwhile;  
                      
                    ?>
                </div>

                <div class="pager">
                  <?php                 
                    the_posts_pagination();
                  ?>
                </div> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <!-- sidebar -->
                <div class="col__sedebar scrolla-element-anim-1 scroll-animate" data-animate="active">
                    <div class="content-sidebar">
                        <aside class="widget-area">
                          <?php 
                            if(is_active_sidebar("blog-sidebar-1")){
                              dynamic_sidebar("blog-sidebar-1");
                            }
                          ?>
                        </aside>
                    </div>
                </div>

            </div>
        </div>

        <div class="v-line-left v-line-top">
            <div class="v-line-block"><span></span></div>
        </div>

    </div>
</div>

<?php
}else{
      // If no content, include the "No posts found" template.
      get_template_part("template-parts/content/content-none");
}


get_footer();