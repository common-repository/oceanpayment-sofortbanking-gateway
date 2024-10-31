<?php
/*
	Plugin Name: Oceanpayment Sofortbanking Gateway
	Plugin URI: http://www.oceanpayment.com/
	Description: WooCommerce Oceanpayment Sofortbanking Gateway.
	Version: 6.0
	Author: Oceanpayment
	Requires at least: 4.0
	Tested up to: 6.1
    Text Domain: oceanpayment-sofortbanking-gateway
*/


/**
 * Plugin updates
 */

load_plugin_textdomain( 'wc_oceansofortbanking', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

add_action( 'plugins_loaded', 'woocommerce_oceansofortbanking_init', 0 );

/**
 * Initialize the gateway.
 *
 * @since 1.0
 */
function woocommerce_oceansofortbanking_init() {

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;

	require_once( plugin_basename( 'class-wc-oceansofortbanking.php' ) );

	add_filter('woocommerce_payment_gateways', 'woocommerce_oceansofortbanking_add_gateway' );

} // End woocommerce_oceansofortbanking_init()

/**
 * Add the gateway to WooCommerce
 *
 * @since 1.0
 */
function woocommerce_oceansofortbanking_add_gateway( $methods ) {
	$methods[] = 'WC_Gateway_Oceansofortbanking';
	return $methods;
} // End woocommerce_oceansofortbanking_add_gateway()