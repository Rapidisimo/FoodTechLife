<?php

/**
 * Theme filters.
 */

namespace App;

use WP_Query;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});


// Primary Nav Menu edits
add_filter('wp_nav_menu', function ($nav_menu, $args) {
    if ($args->theme_location === 'primary_navigation') {
        // Add role="list" for accessibility
        $nav_menu = str_replace('<ul', '<ul role="list"', $nav_menu);
    }
    return $nav_menu;
}, 10, 2);

// Remove the "Home" menu item from the home page
add_filter('wp_nav_menu_objects', function ($items, $args) {
    if ($args->theme_location === 'primary_navigation' && is_front_page()) {
        foreach ($items as $key => $item) {
            if ($item->title === 'Home') {
                unset($items[$key]);
            }
        }
    }
    return $items;
}, 10, 2);

// Modify Query for Recipe Archives
add_action('pre_get_posts', function (WP_Query $query) {
    if (! is_admin() && $query->is_main_query() && $query->is_post_type_archive('recipe')) {
        $query->set('posts_per_page', -1);
    }
});
