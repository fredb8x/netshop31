<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_nh66w' );

/** MySQL database username */
define( 'DB_USER', 'wp_by2e2' );

/** MySQL database password */
// YWcbvspcnkr1$H94
define( 'DB_PASSWORD', 'YWcbvspcnkr1$H94' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'UCWkMsXB3KW23Qc9eufWqfR4iRiRxjt4R7VUp075Fe4pDNEM1R4nyVJV6pD0sZ3j' );
define( 'SECURE_AUTH_KEY',  'Uxfvbk15x7oKvEklTadJJbs0PzqVDxAlwijYhvNg43SeTpYQ6UaVxAdf7a9MAWtc' );
define( 'LOGGED_IN_KEY',    'DOO9o3kQBdHIPHBzVAKyQ8lp3bil60mQSB5TZmWvq1wuOTgVFa7EdkcLasG7f7O5' );
define( 'NONCE_KEY',        'pVJPZntPJYphUX7pqpQL8WOwoWXmZYO5Eo3l69hRNjHka0s0bhFRNrRCsbQdAZyz' );
define( 'AUTH_SALT',        'dRZA1nt2UovqLrQTnEukwDSuVPoXmZV2PFdiAQOkaYoJVavtDfTxiVdP1kD8BBFH' );
define( 'SECURE_AUTH_SALT', 'sp2kArgaP17Vo1Q6CzT5ZybrNCKE5Qo8NJetCI3vzEn9vTPud6cSyudZZx75fkcC' );
define( 'LOGGED_IN_SALT',   'tIAQ0F9z62vji2HT0F858kdMPPDP7Mxl6Wlzx57G4fnOwK4veaI6C7q28y4N30of' );
define( 'NONCE_SALT',       'Grhwl57vXYId0mttWcXrroVSxvdWmqkIDx0ea10JsyQDHHvoSbmWYiJQQkTYZ0xy' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'AaFe3q_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
define( 'WP_POST_REVISIONS', false );

define( 'CONCATENATE_SCRIPTS', false ); 
// define( 'SCRIPT_DEBUG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
