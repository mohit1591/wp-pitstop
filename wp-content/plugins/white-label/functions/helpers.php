<?php
/**
 * General helper functions for White Label.
 *
 * @package white-label
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Is current user a White Label Administrator.
 *
 * @return boolean true/false
 */
function white_label_is_wl_admin() {

	if ( is_multisite() ) {
		// Check if super admin for multisite.
		if ( is_super_admin() ) {
			return true;
		}

		$super_admin_only = get_site_option( 'white_label_mu_super_admin_mode' );

		if ( $super_admin_only && ! is_super_admin() ) {
			return false;
		}
	}

	$wl_admins = white_label_get_option( 'wl_administrators', 'white_label_general', false );

	$current_user = get_current_user_id();

	if ( empty( $current_user ) ) {
		return false;
	}

	// If no White Label admins, then display for all admin.
	if ( empty( $wl_admins ) ) {
		return true;
	}

	// force integer on whole array.
	$wl_admins = array_map( 'intval', $wl_admins );

	if ( in_array( $current_user, $wl_admins, true ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Reset White Label General Options & White Label Administrators via AJAX.
 *
 * Https://dev.local/wp-admin/admin-ajax.php?action=white_label_reset_wl_admins .
 *
 * @return void
 */
function white_label_reset_wl_admins() {

	// Make sure it's on the admin side and the caller is an administrator.
	if ( is_admin() && current_user_can( 'administrator' ) ) {

		delete_option( 'white_label_general' );

		$url = admin_url( '/options-general.php?page=white-label' );

		wp_safe_redirect( $url );
	}
	exit();
}

add_action( 'wp_ajax_white_label_reset_wl_admins', 'white_label_reset_wl_admins' );
