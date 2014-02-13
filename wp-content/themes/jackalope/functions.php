<?php

// 
// SBX additions to the Starter Theme
//------------------------------------------------------------------------------------------


	// Remove default post type from the menu
	function remove_menus(){
	    remove_menu_page( 'edit.php' );
	}
	add_action( 'admin_menu', 'remove_menus' );


	// Remove 'Hello Dolly'
	function goodbye_dolly() {
	    if (file_exists(WP_PLUGIN_DIR.'/hello.php')) {
	        require_once(ABSPATH.'wp-admin/includes/plugin.php');
	        require_once(ABSPATH.'wp-admin/includes/file.php');
	        delete_plugins(array('hello.php'));
	    }
	}
	add_action('admin_init','goodbye_dolly');


	// Auto-include plugins
	require_once dirname( __FILE__ ) . '/tgm-plugin-activation/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

	function my_theme_register_required_plugins() {
 
    // Array of plugin arrays. Required keys are name and slug.
    // If the source is NOT from the .org repo, then source is also required.

    $plugins = array(
        // ACF repeater packaged with the theme 
        array(
        'name' => 'ACF Repeater', // The plugin name
        'slug' => 'acf-repeater', // The plugin slug (typically the folder name)
        'source' => get_stylesheet_directory() . '/tgm-plugin-activation/plugins/acf-repeater.zip', // The plugin source
        'required' => false,
        ),
        // These guys are from the repository
        array(
        'name' => 'Advanced Custom Fields',
        'slug' => 'advanced-custom-fields',
        ),
        array(
        'name' => 'Custom Post Type UI',
        'slug' => 'custom-post-type-ui',
        ),
        array(
        'name' => 'Post Types Order',
        'slug' => 'post-types-order',
        ),
        array(
        'name' => 'GA Google Analytics',
        'slug' => 'ga-google-analytics',
        ),
        array(
        'name' => 'Timber',
        'slug' => 'timber-library',
        )
    );
     
    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'tgmpa';
     
    /*
      Array of configuration settings. Uncomment and amend each line as needed.
      If you want the default strings to be available under your own theme domain,
      uncomment the strings and domain.
      Some of the strings are added into a sprintf, so see the comments at the
      end of each line for what each argument will be.
    */
      
    $config = array(
        /*'domain' => $theme_text_domain, // Text domain - likely want to be the same as your theme. */
        /*'default_path' => '', // Default absolute path to pre-packaged plugins */
        /*'menu' => 'install-my-theme-plugins', // Menu slug */
        'strings' => array(
        /*'page_title' => __( 'Install Required Plugins', $theme_text_domain ), // */
        /*'menu_title' => __( 'Install Plugins', $theme_text_domain ), // */
        /*'instructions_install' => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name */
        /*'instructions_activate' => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
        /*'button' => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name */
        /*'installing' => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name */
        /*'oops' => __( 'Something went wrong with the plugin API.', $theme_text_domain ), // */
        /*'notice_can_install' => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL */
        /*'notice_cannot_install' => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name */
        /*'notice_can_activate' => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
        /*'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name */
        /*'return' => __( 'Return to Required Plugins Installer', $theme_text_domain ), // */
        ),
    );
     
    tgmpa( $plugins, $config );
 
}




// 
// From the Timber Starter Theme
//------------------------------------------------------------------------------------------

	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');

	add_filter('get_twig', 'add_to_twig');
	add_filter('timber_context', 'add_to_context');

	add_action('wp_enqueue_scripts', 'load_scripts');

	define('THEME_URL', get_template_directory_uri());
	function add_to_context($data){
		/* this is where you can add your own data to Timber's context object */
		$data['qux'] = 'I am a value set in your functions.php file';
		$data['menu'] = new TimberMenu();
		return $data;
	}

	function add_to_twig($twig){
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension(new Twig_Extension_StringLoader());
		$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
		return $twig;
	}

	function myfoo($text){
    	$text .= ' bar!';
    	return $text;
	}

	function load_scripts(){
		wp_enqueue_script('jquery');
	}
