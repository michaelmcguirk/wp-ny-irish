<?php
/*
================================================================================================
Beyond Expectations - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This file is used to maintain the main 
functionality and features for this theme. The second file is the template-tags.php that contains 
the extra functions and features.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Content Width
 2.0 - Enqueue Styles and Scripts
 3.0 - Theme Setup
 4.0 - Register Sidebars
 5.0 - Required Files
================================================================================================
*/

/*
================================================================================================
 1.0 - Content Width
================================================================================================
*/
function beyond_expectations_content_width_setup() {
    $GLOBALS['content_width'] = apply_filters('beyond_expectations_content_width_setup', 840);
}
add_action('after_setup_theme', 'beyond_expectations_content_width_setup', 0);

/*
================================================================================================
 2.0 - Enqueue Styles and Scripts
================================================================================================
*/
function beyond_expectations_enqueue_scripts_setup() {
    // Enable and activate the main stylesheet for Beyond Expectations.
    wp_enqueue_style('beyond-expectations-style', get_stylesheet_uri());
    
    wp_enqueue_style('google-font', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '20160601', true);
    
    // Enable and Activate Font Awesome for Beyond Expectations.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '20160601', true);
    
    wp_enqueue_script('beyond-expectations-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '04062015', true);
    
   // Enable and Activate Navigation JavaScript for Beyond Expectations.
    wp_enqueue_script('beyond-expectations-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('beyond-expectations-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'beyond-expectations') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'beyond-expectations') . '</span>',
	));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'beyond_expectations_enqueue_scripts_setup');

/*
================================================================================================
 3.0 - Theme Setup
================================================================================================
*/
function beyond_expectations_theme_setup() {
    // Enable and activate add theme support (title tag) for Beyond Expectations.
    add_theme_support('title-tag');
    
    // Enable and activate add theme support (automatica feed links) for Beyond Expectations.
    add_theme_support('automatic-feed-links');
    
    // Enable and activate add theme support (html5) for Beyond Expectations.
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'caption'
    ));
    
    // 
    add_theme_support('custom-background', array(
        'default'    => 'ffffff',
    ));
    
    add_theme_support('post-thumbnails');
    add_theme_support('beyond-expectations-banner', 840, 260, true);
    
    register_nav_menus(array(
        'primary-navigation' => esc_html__('Primary Navigation', 'beyond-expectations'),
        'social-navigation' => esc_html__('Social Navigation', 'beyond-expectations'),
    ));
    
    // Enable and Activate Load Text Domain for Translation
    load_theme_textdomain('beyond-expectations');
}
add_action('after_setup_theme', 'beyond_expectations_theme_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function beyond_expectations_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'beyond-expectations'),
        'id'            => 'primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));    

    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'beyond-expectations'),
        'id'            => 'secondary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'beyond-expectations'),
        'id'            => 'custom',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )); 
}
add_action('widgets_init', 'beyond_expectations_register_sidebars_setup');

/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/template-tags.php');

/*
================================================================================================
5.0 - Social Navigation
================================================================================================
*/
if (!function_exists('beyond_expectations_social_navigation_setup')) {
    function beyond_expectations_social_navigation_setup() {
        if(has_nav_menu('social-navigation')){
            wp_nav_menu(array(
                'theme_location'    => 'social-navigation',
                'container'         => 'div',
                'container_id'      => 'menu-social',
                'container_class'   => 'menu-social',
                'menu_id'           => 'menu-social-items',
                'menu_class'        => 'menu-items',
                'depth'             => 1,
                'link_before'       => '<span class="screen-reader-text">',
                'link_after'        => '</span>',
                'fallback_cb'       => '',
            ));
        };
    }
}