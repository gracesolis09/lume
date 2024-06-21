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
    <div class="jobs-archive">
        <div class="container">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        echo "<a href=". get_the_permalink() ."><h2>" . get_the_title() . "</h2></a>";
                        echo "<h3>Location: " . get_field('location', get_the_ID()) . "</h3>";
                    endwhile;
            
                else:
            
                    echo __('No job posts available.', 'lume');
            
                endif;
            ?>
        </div>
    </div>
<?php
get_footer();