<?php
/*
Plugin Name: WooCommerce EasyCheckout
Description: Hide billing fields for virtual and downloadable products.
Version: 1.0
Author: Samuel Barden
Author URI: https://samuelbarden.com
*/

// Check if the cart contains any physical product
function cart_contains_physical_product() {
    foreach (WC()->cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        if (!$product->is_virtual() && !$product->is_downloadable()) {
            return true;
        }
    }
    return false;
}

// Conditionally hide billing fields
function hide_billing_fields_for_virtual_downloadable_products($fields) {
    // Check if the cart contains physical products
    if (cart_contains_physical_product()) {
        return $fields; // Show billing fields for physical products
    } else {
        // Hide billing fields for virtual/downloadable products
        unset($fields['billing']['billing_address_1']);
        unset($fields['billing']['billing_address_2']);
        unset($fields['billing']['billing_city']);
        unset($fields['billing']['billing_postcode']);
        unset($fields['billing']['billing_country']);
        unset($fields['billing']['billing_state']);
        unset($fields['billing']['billing_phone']);

        return $fields;
    }
}

// Hook the filter to modify checkout fields
add_filter('woocommerce_checkout_fields', 'hide_billing_fields_for_virtual_downloadable_products', 999);
