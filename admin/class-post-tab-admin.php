<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Post_Tab
 * @subpackage Post_Tab/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Post_Tab
 * @subpackage Post_Tab/admin
 * @author     Md Junayed <admin@easeare.com>
 */
class Post_Tab_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_shortcode( 'post_tab', [$this, 'post_tab_html_view'] );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Post_Tab_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Post_Tab_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		global $post;
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'post_tab') ) {
			
			if(is_single( $post )){
				wp_register_style( $this->plugin_name,  plugin_dir_url( __FILE__ ) . 'css/post-tab-admin.css' );
				wp_enqueue_style( $this->plugin_name );
			}
			
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Post_Tab_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Post_Tab_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		global $post;
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'post_tab') ) {
			
			if(is_single( $post )){
				wp_register_script( $this->plugin_name,  plugin_dir_url( __FILE__ ) . 'js/post-tab-admin.js' );
				wp_enqueue_script( $this->plugin_name );
			}
			
		}

	}

	// post_tab_html_view
	function post_tab_html_view( $atts ){
		global $post;

		$urls = array();

		if($atts && !empty($atts['urls'])){
			$contents = explode(',', $atts['urls']);
		}
		
		if($contents !== null){
			if(is_array($contents)){
				foreach($contents as $url){
					$url = str_replace("'", '', $url);
					if(filter_var(esc_url($url), FILTER_VALIDATE_URL)){
						$urls[] = esc_url($url);
					}
				}
			}
		}

		ob_start();
		require_once plugin_dir_path( __FILE__ ).'partials/post-tab-admin-display.php';
		$output = ob_get_contents();
		ob_get_clean();

		if(is_single( $post )){
			return $output;
		}else{
			return '';
		}
	}

}
