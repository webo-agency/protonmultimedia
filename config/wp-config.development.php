<?php
/**
 * Development environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment 
 * in this file.
 *
 */
  

// 
// FROM PRODUCTION SET - REPLACE WITH LOCAL WERSION
//

define('WP_CACHE', false);


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress');

/** MySQL database username */
define( 'DB_USER', 'wordpress');

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define( 'DB_HOST', 'db:3306');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0f41bad426f0f3a607ddcad8c6207b861b42d7eb');
define( 'SECURE_AUTH_KEY',  '9462195b1e56ad268c05162d47a5913eb1a02676');
define( 'LOGGED_IN_KEY',    'e65ac5612d22a835605ba7ce61d54483d5b56e39');
define( 'NONCE_KEY',        'aee0183a76b069402c55acfe173d269b141c1a06');
define( 'AUTH_SALT',        '97abd8f5fb2383351e78b0618f25a14dc88789d3');
define( 'SECURE_AUTH_SALT', '9a3fe40913fb4bec6efb0e1f2ef1d4eb8341795c');
define( 'LOGGED_IN_SALT',   'b2beca42cb9a0400380971fef2fdc8bdf15fe999');
define( 'NONCE_SALT',       '19d44b375a176f9425f45208a175737571e982e4');

/**#@-*/

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

error_reporting(E_ALL);
ini_set('display_errors', 'on');

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $_SERVER['HTTPS'] = 'on';
}
