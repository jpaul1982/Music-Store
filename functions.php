<?php


// require_once get_template_directory() . '/inc/scripts.php';
require_once get_template_directory() . '/inc/ajax/filter.php';

function add_music_store_scripts()
{

  // deregister default scripts
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '2.1.3');
  wp_enqueue_script('jquery');
  wp_enqueue_script('jqueryui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js', false, '1.11.4');

  // wp_enqueue_script('ajax', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), NULL, true);

  // Slick slider
  wp_enqueue_script('slick-script', get_template_directory_uri() . '/lib/slick/slick.min.js', false, '1.8.1');
  wp_enqueue_style('slick-style', get_template_directory_uri() . '/lib/slick/slick.css');

  // fontawesome
  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/lib/fontawesome/css/fontawesome.min.css');
  wp_enqueue_style('font-awesome-brands', get_template_directory_uri() . '/lib/fontawesome/css/brands.min.css');
  wp_enqueue_style('font-awesome-solid', get_template_directory_uri() . '/lib/fontawesome/css/solid.min.css');

  //add bootstrap cdn
  wp_enqueue_style('bootstrap_css', '//stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap_jquery', '//code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.3.1', true);
  wp_enqueue_script('bootstrap_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), '1.14.7', true);
  wp_enqueue_script('bootstrap_javascript', '//stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js', array(), '4.3.1', true);

  // add gsap
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', false, '3.9.1');

  // add scroll trigger
  wp_enqueue_script('scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js', false, '3.9.1');

  // compiled styles
  wp_enqueue_style('style', get_template_directory_uri() . '/dist/css/style.css');

  // scripts
  wp_register_script('compiled-scripts', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('compiled-scripts');
}
add_action('wp_enqueue_scripts', 'add_music_store_scripts');



/*************************************************************/
/* * ADVANCED CUSTOM FIELDS - OPTIONS PAGES					 			
/*************************************************************/

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Site Options',
    'menu_title'  => 'Site Options',
    'menu_slug'   => 'global-options',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

if (!function_exists('music_store_setup')) :
  function music_store_setup()
  {

    add_image_size('small', 420, 420, false);
    add_image_size('card', 696, 530, array('center', 'center'));
    add_image_size('square', 600, 600, array('center', 'center'));
    add_image_size('background', 1800, 1200, false);

    //Remove Menu pages

    /*************************************************************/
    /*  EDITOR STYLES 			 								*/
    /***********************************************************/
    add_editor_style('dist/css/editor-style.css');

    /*************************************************************/
    /*  REGISTER MENUS 			 								*/
    /***********************************************************/
    register_nav_menus(
      array(
        'global' => __('Main Menu'),
        'footer' => __('Footer Menu')
      )
    );

    /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
    add_theme_support('html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
    add_theme_support('post-formats', array(
      'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
    ));

    /*
         * Enable featured image support.
         * See http://codex.wordpress.org/Post_Thumbnails
         */
    add_theme_support('post-thumbnails');

    // This theme uses its own gallery styles.
    add_filter('use_default_gallery_style', '__return_false');
  }
endif; // music_store_setup
add_action('after_setup_theme', 'music_store_setup');

// function remove_category($string, $type)
// {
//   if ($type != 'single' && $type == 'category' && (strpos($string, 'category') !== false)) {
//     $url_without_category = str_replace("/category/", "/", $string);
//     return trailingslashit($url_without_category);
//   }
//   return $string;
// }
// add_filter('user_trailingslashit', 'remove_category', 100, 2);





