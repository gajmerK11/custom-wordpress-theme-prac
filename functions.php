<?php

// This function is for dynamically generating title tag
function followkumar_theme_support(){
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    // Adds dynamic logo support
    // Just adding this won't show the logo; all it does is it enables the option in Customize to upload the logo; to display it we need write separate line of code (check header.php file for the code to output the logo)
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'followkumar_theme_support');


// This function is for loading css
function followkumar_register_styles(){

    // This is for dynamically getting the version mentioned in style.css
    $version = wp_get_theme()->get('Version');


    /* 
    1. 'followkumar-style' - it is the value for first parameter for function wp_enqueue_style. You can set it anything you want.
    2. Second parameter is the path to my stylesheet
    */ 

    // The reason here are three 'wp_enqueue_stylye()' functions is to dynamically load the three css -> theme css, bootstrap css, fontawesome css.
    
    // Since this stylesheet is dependent on bootstrap css, to get the actual design of the theme-template bootstrap css has to be loaded first, for that, we have passed 'followkumar-bootstrap' as parameter in array() of followkumar-style because that array represents "An array of other styles that this one depends on." (To see what do i mean, remove the array parameter and check)
    
    wp_enqueue_style('followkumar-style', get_template_directory_uri() . "/theme-template/css/style.css", array('followkumar-bootstrap'), $version, 'all');

    wp_enqueue_style('followkumar-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');

    wp_enqueue_style('followkumar-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

// to make this function hook into wordpress system, we are using add_action. So what the following line of code is saying that "When wordpress runs the hook 'wp_enqueue_scripts', use my function 'followkumar_register_styles'
add_action('wp_enqueue_scripts', 'followkumar_register_styles' );


// This function is for loading scripts(JS file) -> similar to above
function followkumar_register_scripts(){
    // The fourth parameter here is '$in_footer' which means -> Load in footer (true) or head (false)
    wp_enqueue_script('followkumar-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    
    wp_enqueue_script('followkumar-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    
    wp_enqueue_script('followkumar-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);

    wp_enqueue_script('followkumar-main', get_template_directory_uri() . "/assets/js/main.js");
    
}
add_action('wp_enqueue_scripts', 'followkumar_register_scripts' );


// This function is for dynamically loading sidebar menu
function followkumar_menus()  {
    // Inorder to setup menus in WordPress, we need to setup menus location i.e. where we want menus to be displayed. Here, we are setting up two menus location.
    $locations = array(
        // In this array, key is menu location name and value is like the title
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );
    // this is default wordpress function for registering menus. without this 'Menus' will not appear inside Appearance
    register_nav_menus($locations);
}
// If we don't hook into 'init' hook also 'Menus' will not appear inside Appearance
add_action('init', 'followkumar_menus');
