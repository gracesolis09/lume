<?php
function lume_create_post_type(
    string $post_type_name,
    string $singular = 'Custom Post', 
    string $plural = 'Custom Posts', 
    string $menu_icon = 'dashicons-admin-post',
    bool $hierarchical = false, 
    bool $has_archive = true, 
    string $description = '' ) {


    register_post_type( $post_type_name, array(
        'label'             => __( $singular, 'lume' ),
        'description'       => $description,
        'menu_icon'         => $menu_icon,
        'hierarchical'      => $hierarchical,
        'has_archive'       => $has_archive,
        'supports'          => array('title', 'editor', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'comments'),
        'labels'            => array(
            'name'                => _x( $plural, 'Post Type General Name', 'lume' ),
            'singular_name'       => _x( $singular, 'Post Type Singular Name', 'lume' ),
            'menu_name'           => __( $plural, 'lume' ),
            'parent_item_colon'   => __( 'Parent '.$singular, 'lume' ),
            'all_items'           => __( 'All '.$plural, 'lume' ),
            'view_item'           => __( 'View '.$singular, 'lume' ),
            'add_new_item'        => __( 'Add New '.$singular, 'lume' ),
            'add_new'             => __( 'Add New', 'lume' ),
            'edit_item'           => __( 'Edit '.$singular, 'lume' ),
            'update_item'         => __( 'Update '.$singular, 'lume' ),
            'search_items'        => __( 'Search '.$singular, 'lume' ),
            'not_found'           => __( 'Not Found', 'lume' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'lume' ),
        ),
        'capability_type'   => 'post',
        'public'            => true,
        'show_in_rest'      => true,
        'can_export'        => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        // 'taxonomies'          => array( 'category' ),
    ));

}
add_action( 'init', 'lume_custom_cpts' );
function lume_custom_cpts() {
    lume_create_post_type( 'careers', 'Careers', 'Careers', 'dashicons-businessperson' );
}