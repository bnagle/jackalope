<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.1
 */

	if (!class_exists('Timber')){
		echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	}
	$context = Timber::get_context();

	// Grab the announcements and add them to the context
	$context['announcements'] = Timber::get_posts('post_type=announcements');

	// Grab this season's shows and add them to the context
	//**** NEED TO SET THIS UP  ****//
	$context['current_season'] = Timber::get_posts('post_type=season');

	// Grab the URL of the theme's directory
	$context['theme_directory'] = get_template_directory_uri();


	// $context['posts'] = Timber::get_posts(); -> DEFAULT FUNCTION FOR GRABBING POSTS, WE REPLACED WITH CUSTOM POST TYPES
	$templates = array('index.twig');
	if (is_home()){
		array_unshift($templates, 'home.twig');
	}

	//Render the context
	Timber::render('index.twig', $context);


