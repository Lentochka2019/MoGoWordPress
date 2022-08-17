<?php

/**
 * Html-Template In Base Mogo psd-maket
 *
 */
register_sidebar(array(
	'name' => 'Sidebar',
	'id' => 'Sidebar'
));
register_nav_menus(
	array(
		'main_nav' => 'Main menu'
	)
);
require(get_template_directory() . '/custom-type.php');

if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(150, 150);
}

if (function_exists('add_image_size')) {
	add_image_size('team-thumb', 9999, 9999, 'center', 'center');
	add_image_size('news-thumb', 9999, 235, true);
	add_image_size('post-thumb', 9999, 300, true);
}

if (!function_exists('new_excerpt_length')) :
	function new_excerpt_length($length)
	{
		return 10;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
endif;

if (!function_exists('lenta_scripts_add')) :
	add_action('wp_enqueue_scripts', 'lenta_scripts_add', 11);
	function lenta_scripts_add()
	{
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js');
		wp_enqueue_script('jquery');
		wp_enqueue_script('project.js',	get_template_directory_uri() . '/js/project.js', array('jquery'), 1, false);
		wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js');
		wp_enqueue_script('popper');
		wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js');
		wp_enqueue_script('bootstrap');
	}
endif;

if (!function_exists('getPostViews')) :
	function getPostViews($postID)
	{
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if ($count == '') {
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0";
		}
		return $count;
	}
endif;
if (!function_exists('setPostViews')) :
	function setPostViews($postID)
	{
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if ($count == '') {
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
endif;
if (!function_exists('customDate')) :

	function customDate($postID)
	{
		$date = get_the_date($postID);
		return $date;
	}

endif;

if (!class_exists('main_menu')) :
	class main_menu extends Walker_Nav_Menu
	{
		// add classes to ul sub-menus
		function start_lvl(&$output, $depth = 0, $args = NULL)
		{
			// depth dependent classes
			$indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
			$display_depth = ($depth + 1); // because it counts the first submenu as 0
			$classes = array(
				'sub-menu',
				($display_depth % 2  ? 'menu-odd' : 'menu-even'),
				($display_depth >= 2 ? 'sub-sub-menu' : ''),
				'menu-depth-' . $display_depth
			);
			$class_names = implode(' ', $classes);

			// build html
			$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}

		// add main/sub classes to li's and links
		function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
		{
			global $wp_query;

			// Restores the more descriptive, specific name for use within this method.
			$item = $data_object;

			$indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

			// depth dependent classes
			$depth_classes = array(
				($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
				($depth >= 2 ? 'sub-sub-menu-item' : ''),
				($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
				'menu-item-depth-' . $depth
			);
			$depth_class_names = esc_attr(implode(' ', $depth_classes));

			// passed classes
			$classes = empty($item->classes) ? array() : (array) $item->classes;
			$class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

			// build html
			$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="nav-item ' . $depth_class_names . ' ' . $class_names . '">';

			// link attributes
			$attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
			$attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
			$attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
			$attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . ' nav-link"';

			$item_output = sprintf(
				'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters('the_title', $item->title, $item->ID),
				$args->link_after,
				$args->after
			);

			// build html
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}
	}
endif;
