<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file.
 * 
 * Please note if you add constants in this file (i.e. define statements) 
 * these cannot be overridden in environment config files so make sure these are only set once.
 * 
 */

// /**#@+
//  * Authentication Unique Keys and Salts.
//  *
//  * Change these to different unique phrases!
//  * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
//  * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
//  *
//  * @since 2.6.0
//  */
// define('AUTH_KEY',         'put your unique phrase here');
// define('SECURE_AUTH_KEY',  'put your unique phrase here');
// define('LOGGED_IN_KEY',    'put your unique phrase here');
// define('NONCE_KEY',        'put your unique phrase here');
// define('AUTH_SALT',        'put your unique phrase here');
// define('SECURE_AUTH_SALT', 'put your unique phrase here');
// define('LOGGED_IN_SALT',   'put your unique phrase here');
// define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

// Recommended WP config settings, uncomment to use these

/**
 * Increase memory limit. 
 */
//define('WP_MEMORY_LIMIT', '128M');

/**
 * Limit post revisions.
 */
//define('WP_POST_REVISIONS', 5);

/**
 * Disable automatic updates.
 */
//define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Disable file editor.
 */
define( 'DISALLOW_FILE_EDIT', true );