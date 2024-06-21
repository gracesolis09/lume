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
    lume_create_post_type( 'jobs', 'Jobs', 'Jobs', 'dashicons-businessperson' );
    lume_create_post_type( 'public-health-topic', 'Public Health Topic', 'Public Health Topics', 'dashicons-welcome-learn-more' );
}

// Register taxonomy for public-healt-topic
function public_health_topic_taxonomy() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Public Health Topics', 'public-health-topics', 'lume' ),
        'singular_name'     => _x( 'Public Health Topic', 'public-health-topic', 'lume' ),
        'edit_item'         => __( 'Edit Public Health Topic', 'lume' ),
        'update_item'       => __( 'Update Public Health Topic', 'lume' ),
        'add_new_item'      => __( 'Add New Public Health Topic', 'lume' ),
        'new_item_name'     => __( 'New Public Health Topic', 'lume' ),
        'menu_name'         => __( 'Public Health Topic', 'lume' ),
        'parent_item'       => __( 'Parent Category', 'lume' ),
		'parent_item_colon' => __( 'Parent Category:', 'lume' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'public-health-topic' ),
        'show_in_rest'      => true,
    );
    register_taxonomy( 'public-health-topic', array( 'public-health-topic' ), $args );
    // register_taxonomy( 'public-health-topic', array( 'clinic', 'class' ), $args );
}

//To rename posts to Custom name
add_action( 'init', 'lume_change_post_object' );
function lume_change_post_object() {
    $get_post_type = get_post_type_object( 'post' );
    $labels = $get_post_type->labels;
        $labels->name = __( 'Custom Name', 'lume' );
        $labels->singular_name = __( 'Custom Name', 'lume' );
        $labels->add_new = __( 'Add Custom Name', 'lume' );
        $labels->add_new_item = __( 'Add Custom Name', 'lume' );
        $labels->edit_item = __( 'Edit Custom Name', 'lume' );
        $labels->new_item = __( 'Custom Name', 'lume' );
        $labels->view_item = __( 'View Custom Name', 'lume' );
        $labels->search_items = __( 'Search Custom Name', 'lume' );
        $labels->not_found = __( 'No Custom Name found', 'lume' );
        $labels->not_found_in_trash = __( 'No Custom Name found in Trash', 'lume' );
        $labels->all_items = __( 'All Custom Name', 'lume' );
        $labels->menu_name = __( 'Custom Name', 'lume' );
        $labels->name_admin_bar = __( 'Custom Name', 'lume' );
}


// Remove tags support from posts
function lume_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'lume_unregister_tags');