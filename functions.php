<?php
if ( ! function_exists( 'stream_setup' ) ): {
    function stream_setup() {
        register_nav_menus( array(
            'primary-menu' => esc_html__( 'Primary Menu', 'stream' ),
        ) );
    }
}
endif;
add_action( 'after_setup_theme', 'stream_setup' );

$args = array(
    'labels' => array(
            'name'          => 'Books',
            'singular_name' => 'Book',
            'menu_name'     => 'Books',
            'add_new'       => 'Add New Book',
            'add_new_item'  => 'Add New Book',
            'new_item'      => 'New Book',
            'edit_item'     => 'Edit Book',
            'view_item'     => 'View Book',
            'all_items'     => 'All Books',
    ),
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
);

register_post_type( 'book', $args );

$argss = array(
    'labels' => array(
            'name'          => 'Products',
            'singular_name' => 'Product',
            'menu_name'     => 'Products',
            'add_new'       => 'Add New Product',
            'add_new_item'  => 'Add New Product',
            'new_item'      => 'New Product',
            'edit_item'     => 'Edit Product',
            'view_item'     => 'View Product',
            'all_items'     => 'All Products',
    ),
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
);

register_post_type( 'Product', $argss );

function create_book_taxonomies() {
    $labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Genres', 'textdomain' ),
        'all_items'         => __( 'All Genres', 'textdomain' ),
        'parent_item'       => __( 'Parent Genre', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
        'edit_item'         => __( 'Edit Genre', 'textdomain' ),
        'update_item'       => __( 'Update Genre', 'textdomain' ),
        'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
        'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
        'menu_name'         => __( 'Genre', 'textdomain' ),
    );
    $args = array(
        'hierarchical'      => true, // set to true for category-like structure
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );
    register_taxonomy( 'genre', [ 'post' ], $args ); // Associates with the default 'post' post type
}
add_action( 'init', 'create_book_taxonomies' );
