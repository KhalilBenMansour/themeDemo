<?php
// Include NavWaler Class For Bootstrap Navigation Menul

// bootstrap 5 wp_nav_menu walker
/*--------------------------------------------------------------------------------------------------- */
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
// register a new menu
// register_nav_menu('main-menu', 'Main menu');
/*--------------------------------------------------------------------------------------------------- */

// Add post thumbnail or featured image 
add_theme_support('post-thumbnails');
/**
 * functions to add my custom styles
 * added by khalil
 * wp_enqueue_style()
 */
function slug_add_styles()
{
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . "/css/all.min.css");
    wp_enqueue_style('main', get_template_directory_uri() . "/css/main.css");
};

/**
 * functions to add my custom scripts
 * added by khalil
 * wp_enqueue_script()
 */
function slug_add_scripts()
{
    // Remove Registeration For Old jQuery
    wp_deregister_script('jquery');
    //register a new jquery in footer elzero don't put the minified version
    wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), array(), false, true);
    // Enqueue The New jQuery
    wp_enqueue_script('jquery');
    // Add Bootstrap Script File
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), false, true);
    // Add font awesome Script File
    wp_enqueue_script('font-awesome-js', get_template_directory_uri() . '/js/all.min.js', array(), false, true);
    // Add Main File Script
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), false, true);
    // Add Html5shiv For Old Browsers
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js');
    // Add Conditional Comment For Html5shiv
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    // Add Respond Script For Old Browser
    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js');
    // Add Conditional Comment For Respond
    wp_script_add_data('respond', 'conditional', 'lt IE 9');
}


/**
 * Add custom menu support
 * added by @khalil
 */
function khalil_register_custom_menu()
{
    register_nav_menus(array(
        'bootstrap-menu' => 'Navigation Bar',
        'footer-menu' => 'Footer Bar'
    ));
}

//Adding nav menu
function khalil_bootstrap_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'bootstrap-menu',
        'menu_class' => 'navbar-nav ms-auto',
        'container' => false,
        'depth' => 2,
        'walker' => new bootstrap_5_wp_nav_menu_walker()
    ));
}

/**
 * Customize the Excerpt word length & Read more dots
 */
function khalil_excerpt_custom_length()
{
    return 20;
}
add_filter('excerpt_length', 'khalil_excerpt_custom_length');

function khalil_excerpt_custom_more()
{
    return ' ...';
}
add_filter('excerpt_more', 'khalil_excerpt_custom_more');

/**
 * Add action hooks
 */
//Add css styles
add_action('wp_enqueue_scripts', 'slug_add_styles');
//Add js scripts
add_action('wp_enqueue_scripts', 'slug_add_scripts');
//Register custom menu
add_action('init', 'khalil_register_custom_menu');
