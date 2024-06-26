<?php
function lume_enqueue_scripts() {
    $version = '1.48';
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), $version);

    wp_enqueue_script( 'main-jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '', true );
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '', true );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array(), '', true, $version );
    wp_enqueue_script( 'jquery-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array(), '', true );
    
    if ( has_block( 'acf/lume-text-slider' ) ) {
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.carousel.min.js', array(), '', true );
    }
}
add_action( 'wp_enqueue_scripts', 'lume_enqueue_scripts', 4 );


function lume_register_nav_menu() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'lume' ),
    ) );
}
add_action( 'after_setup_theme', 'lume_register_nav_menu', 0 );

/*
* Add ACF Options Page
*/
if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ) );
}
/**
 * Theme Support
 */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'align-wide' );
add_theme_support( 'editor-styles' );
add_editor_style( 'assets/css/custom-editor-style.css' );

// add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Allow SVG
 */
function lume_add_file_types_to_uploads( $file_types ) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge( $file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'lume_add_file_types_to_uploads');

function lume_add_block_group_inner( $block_content, $block ) {
    $tag_name                         = isset( $block['attrs']['tagName'] ) ? $block['attrs']['tagName'] : 'div';
	$group_with_inner_container_regex = sprintf(
		'/(^\s*<%1$s\b[^>]*wp-block-group(\s|")[^>]*>)(\s*<div\b[^>]*wp-block-group__inner-container(\s|")[^>]*>)((.|\S|\s)*)/U',
		preg_quote( $tag_name, '/' )
	);

	$replace_regex   = sprintf(
		'/(^\s*<%1$s\b[^>]*wp-block-group[^>]*>)(.*)(<\/%1$s>\s*$)/ms',
		preg_quote( $tag_name, '/' )
	);
	$updated_content = preg_replace_callback(
		$replace_regex,
		static function( $matches ) {
			return $matches[1] . '<div class="wp-block-group__inner-container">' . $matches[2] . '</div>' . $matches[3];
		},
		$block_content
	);
	return $updated_content;
}
add_filter( 'render_block_core/group', 'lume_add_block_group_inner', 10, 2 );