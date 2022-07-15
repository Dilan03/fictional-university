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
define( 'DB_NAME', 'fictional-university' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'EIpv=wKC{pM|tUbuJ!nsB/j>,)OzmnC+dT&zJ#w;xDpX3&eu i7~4IQrm=hH(So?' );
define( 'SECURE_AUTH_KEY',  '2cl!Q@gZ(M=kv-3^dWPMonOQ+Mt!ud<TR)vLpm`:g,Ivkf{5_3@+hM8pTGM>d_O)' );
define( 'LOGGED_IN_KEY',    '3~Lu?%%]`tC@2.2$USx.tx:tcJA<a&4ICS$XYZY?ud?p?%!k/6<_PRp+FnU3yiXl' );
define( 'NONCE_KEY',        'T1l@!cNu#QV>;CzPS:bxED,9~CPA=Z?eNN`(aFGNdV$XA2r9vUChZ3ZWhoVcgi@i' );
define( 'AUTH_SALT',        '^k_~?@y+oZ6~g*-d9[!b&.?$8}?^LjBlrxo:j|EpZ%zN1hhmv&4ezl7AQq>tCE&F' );
define( 'SECURE_AUTH_SALT', 'L1P8%FbU<{])dxHV:Cz0VY*zR9{U1ttM1/h@-PJxbYHFMP0V26DFnuMMN^N)j0`Y' );
define( 'LOGGED_IN_SALT',   'hV-$KkalEE,YyF@&+PJQ%Bu0zuY@ T%iXjGeedYTZLaYd^aaB*]}t^gbvR:,zFR(' );
define( 'NONCE_SALT',       'Qmec|q+xq,9x{K*9qz?M5iwhkCZ2`!)U8}ZrZZx3>e}x~q1.F~)dvx&)wg{1r620' );

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
