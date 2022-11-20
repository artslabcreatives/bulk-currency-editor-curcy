<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testdb' );

/** Database username */
define( 'DB_USER', 'homestead' );

/** Database password */
define( 'DB_PASSWORD', 'secret' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'u^/tm2v(v&4{0B TzO!%jx :74c{.PzE?VPd8igT85iLt5|8uPD@w6`}]vQvAcwh' );
define( 'SECURE_AUTH_KEY',  'rBzfb!O`S-G/N;rd^Gj*viVwvtjj{vWrfVRWnA-tB$I3MH7^$7>LOt)[yHY^k/ag' );
define( 'LOGGED_IN_KEY',    '/R.Ztj7pNHKs,zvQO>6kgJhMcoIB6NZEmCw9H_(/#bs{}RwC=pt77a#{G*MPg;e.' );
define( 'NONCE_KEY',        'm/{M^_QNTJt`vgCS wE)eF~4ns4[v@1o&*-pKwL&/,~IirQX2Pbg6$UA.d]pHk<q' );
define( 'AUTH_SALT',        '_)7RI UJ>|f|f?1m1^&y4Bd83.As3~P)rZma_w!;M?~&{Ut9|N}pLtFw)-%/7B!4' );
define( 'SECURE_AUTH_SALT', 'qrc?oj,]80tCGkjfXK5!^T?e!k97&hBH!|{%ud1L<Z-U|+o+V=H1s0}wXEAOtDXA' );
define( 'LOGGED_IN_SALT',   'K)8mV$>iAWh.^<V!SfSZbC09P:dE%b3GzL=rQNi9.e>BhvDU<Er@?tIQIM7hMngl' );
define( 'NONCE_SALT',       'lys~:5<tbpdCYlmJYZ My30qyt(Wa.ohGp!#!;y0-KsSnplr%<)1[cz#98SO|u!d' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
