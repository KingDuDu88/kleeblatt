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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'Ilu2d2m4e!' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'Ko#([DuNDQ}}Z._D(CK]e*=Qm+103@LB+a|j&4-hV67.`YQ0]d6-r;DU7e6XN2c(');
define('SECURE_AUTH_KEY',  '9^Gm-tg3wu<btx6uk^4<[73-*k+{9n9M!4z)VZL<q/pFju812QU=NcaU2x#[$yi^');
define('LOGGED_IN_KEY',    ':.!8k!A1a!2jc;||DgAHt|!BLK|6l8m`|EdHb+I|J+*SH*fWO=Kd3:{1N&7jqWRp');
define('NONCE_KEY',        'v}&;lNM~!%`|TcEU95dRQyn]-kQWNL2C;R~!d,W-20ks.kKb!H{+)$kS2Ft.CcYQ');
define('AUTH_SALT',        'vvqnMAB]RzBn}KG4(zEGQk)zqQH/!< E-3r-Sjb+8ZG+R:|HzhP<flHWD2b2}-2s');
define('SECURE_AUTH_SALT', '7b=L1r| &cS_[]3l,2*-0O>Aqi20z7p+0CCi|P]0!,K^,A=w>fcKst-<{qmmX5B+');
define('LOGGED_IN_SALT',   '|D] CtU>zz+f+uZgg#3..[dY,WK<!`+!zCjWW-8pmS|0|p#!5}P[635&x:#UgF+p');
define('NONCE_SALT',       '3pT<*~O;x|S@<@*iY5N1i+lD^T- ]y;YNT,3^5uG&AQkZ93WoXHk-<jn9dpo95],');

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
