<?php
/**
 * The template for displaying single job posts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();
?>
    <div class="row jobs-hero" style="background-image:url(<?php echo get_field('background_graphic', 'option') ?>); background-color:<?php echo get_field('background_color', 'option') ?>">
        <h1 class="mb-0"><?php echo get_field('hero_title', 'option') ?></h1>
    </div>
    <div class="single--job">
        <div class="container">
            <h2><?php echo get_the_title() ?></h2>
            <h3>Location:        <?php echo get_field('location') ?></h3>
            <?php the_content(); ?>
        </div>
    </div>
<?php
get_footer();