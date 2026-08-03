<?php

add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'align-wide' );
add_theme_support( 'wp-block-styles' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'editor-styles' );
add_editor_style( 'css/editor.css' );

function linux_wp_theme_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'linux-buttons', get_template_directory_uri() . '/javascript/buttons.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_style( 'linux-blocks', get_template_directory_uri() . '/css/blocks.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'linux_wp_theme_scripts' );

if ( function_exists( 'register_sidebar' ) ) {

    register_sidebar( array(
        'name'          => __( 'Sidebar Area 1', 'linux-wp-theme' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Area', 'linux-wp-theme' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'An optional widget area for your site footer', 'linux-wp-theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );

}

add_theme_support( 'menus' );
register_nav_menus( array(
    'menu'    => 'Header Menü',
    'menu_en' => 'Header Menü English',
) );
