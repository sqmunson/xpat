<?php
/**
 * WordPress AJAX Process Execution.
 *
 * @package WordPress
 * @subpackage Administration
 *
 * @link http://codex.wordpress.org/AJAX_in_Plugins
 */

/**
 * Executing AJAX process.
 *
 * @since 2.1.0
 */
define( 'DOING_AJAX', true );
if ( ! defined( 'WP_ADMIN' ) ) {
    define( 'WP_ADMIN', true );
}

if (file_exists('../../../../../wp-load.php')) {
    /** Load WordPress Bootstrap */
    require_once( '../../../../../wp-load.php' );
} else if (file_exists('../../../../wp-load.php')) {
    /** Load WordPress Bootstrap */
    require_once( '../../../../wp-load.php' );
} else {
    die( '0' );
}



// Require an action parameter
if ( empty( $_REQUEST['action'] ) )
    die( '0' );

$core_actions_get = array('lazy_load_query');

// Register core Ajax calls.
if ( ! empty( $_GET['action'] ) && in_array( $_GET['action'], $core_actions_get ) )
    add_action( 'wp_ajax_' . $_GET['action'], 'wp_ajax_' . str_replace( '-', '_', $_GET['action'] ), 1 );

header('Content-Type: text/html');

header('Cache-Control: max-age=30, public');

if ( is_user_logged_in() ) {
    /**
     * Fires authenticated AJAX actions for logged-in users.
     *
     * The dynamic portion of the hook name, `$_REQUEST['action']`,
     * refers to the name of the AJAX action callback being fired.
     *
     * @since 2.1.0
     */
    do_action( 'wp_ajax_' . $_REQUEST['action'] );
} else {
    /**
     * Fires non-authenticated AJAX actions for logged-out users.
     *
     * The dynamic portion of the hook name, `$_REQUEST['action']`,
     * refers to the name of the AJAX action callback being fired.
     *
     * @since 2.8.0
     */
    do_action( 'wp_ajax_nopriv_' . $_REQUEST['action'] );
}
// Default status
die( '0' );
