<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

add_action( 'init', 'register_postback_endpoint' );
function register_postback_endpoint() {
    add_rewrite_endpoint( 'postback', EP_ROOT );
}

	add_action( 'template_redirect', 'handle_postback_endpoint' );
	function handle_postback_endpoint()
		{
    		global $wp_query, $wpdb;
    			if (isset($wp_query->query_vars['postback']) )
					{
						$secret_key ='7QTx0533uzP1KxpYnTJ3tfNfiorrLiLb' ;// replace with your app's secret key
        				$hash = $_POST['hash'];
        				unset( $_POST['hash'] ); // remove the hash parameter from the postback data
						ksort( $_POST ); // sort the postback data by key
						$data = array(
            				'user_id' => $_POST['user_id'],
           					'pub_id' => $_POST['pub_id'],
            				'app_id' => $_POST['app_id'],
            				'amount' => $_POST['amount'],
            				'payout' => $_POST['payout'],
            				'offer_id' => $_POST['offer_id'],
            				'offer_name' => $_POST['offer_name'],
            				'event_id' => $_POST['event_id'],
            				'event_name' => $_POST['event_name'],
            				'txn_id' => $_POST['txn_id'],
            				'currency_name' => $_POST['currency_name'],
            				'timestamp' => current_time( 'mysql' ));
					
        			$table_name = $wpdb->prefix . 'offerwall_transactions';
					$wpdb->insert( $table_name, $data );
					$calculated_hash = sha1( http_build_query( $_POST ) . $secret_key ); // calculate the SHA1 HMAC of the postback data

        		/*	if ( $calculated_hash === $hash ) 
						{ */
           					function update_user_wallet($user_id, $payout_amount, $transaction_description) 
			
  							{
  									$user_id = urlencode($user_id);// encode any spaces in the user's username or other parameters using RFC 1738 encoding
  									$description = urlencode($transaction_description);
  									if ($payout_amount >= 0) // check if the payout amount is positive or negative
										{
    										$transaction_type = 'credit'; // credit the user's wallet
  										} 
									else 
										{
    										$transaction_type = 'debit';// debit the user's wallet
  										}

  					$api_url = 'https://kleeblatt.games/wp-json/wsfw-route/v1/wallet/' . $user_id;  // send an HTTP PUT request to the wallet API endpoint 
  					$data = array(
    						'amount' => abs($payout_amount),
    						'action' => $transaction_type,
    						'transaction_detail' => $description,
    						'consumer_key' => 'da7236fc1ccc9764a703935a838946ba',
    						'consumer_secret' => '2c457cec4507458bd28ded3fd560e9bd');
  					$options = array(
    						'http' => array(
      						'method' => 'PUT',
      						'content' => json_encode($data),
      						'header' => 'Content-Type: application/json'));
 					$context = stream_context_create($options);
  					$result = file_get_contents($api_url, false, $context);
  					if ($result === false)  // check the result of the API call
  						{
    						return false; // error, handle the error accordingly
  						} 
					else 
						{
    						$result_data = json_decode($result, true);
    				if ($result_data['status'] == 'success') 
						{
      						return true; // success, update your database table to mark the offer as completed and credited user wallet
    					} 
					else 
						{
      						return false; // error, handle the error accordingly
    					}
  				}
			}
			
			
			
			
			
			
            echo '1';
        	/*} 
			
			else 
			{
            	echo '0';// send a response to indicate that the postback was received incorrectly
        	}*/

        exit; // stop processing the request
    }
}


















if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.7.1' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		if ( apply_filters( 'hello_elementor_register_menus', true ) ) {
			register_nav_menus( [ 'menu-1' => esc_html__( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => esc_html__( 'Footer', 'hello-elementor' ) ] );
		}

		if ( apply_filters( 'hello_elementor_post_type_support', true ) ) {
			add_post_type_support( 'page', 'excerpt' );
		}

		if ( apply_filters( 'hello_elementor_add_theme_support', true ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', true ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		if ( apply_filters( 'hello_elementor_register_elementor_locations', true ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
*/

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

/**
 * Include customizer registration functions
*/
function hello_register_customizer_functions() {
	if ( is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_register_customizer_functions' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

/**
 * BC:
 * In v2.7.0 the theme removed the `hello_elementor_body_open()` from `header.php` replacing it with `wp_body_open()`.
 * The following code prevents fatal errors in child themes that still use this function.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		wp_body_open();
	}
}
