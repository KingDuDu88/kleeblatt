<?php 
// hey day
    if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'] )) {
      if (strpos( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
        $_SERVER['HTTPS']='on';
      }
    };
    define( 'WP_MEMORY_LIMIT', '128M' );
    define( 'WP_MAX_MEMORY_LIMIT', '256M' );
    define( 'FS_METHOD', 'direct');
    define( 'AUTOSAVE_INTERVAL', 160 );
    define( 'WP_POST_REVISIONS', 5 );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "wordpress" );
/** Database username */
define( 'DB_USER', "wordpress" );
/** Database password */
define( 'DB_PASSWORD', "Ilu2d2m4e!" );
/** Database hostname */
define( 'DB_HOST', "localhost" );
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
define( 'AUTH_KEY',          'l4RXRLihQBOE8Ys.DIdcIiUtm0 yE.!r</rA74!mUAm!< 1p*0H<W?X~5h*RuOwD' );
define( 'SECURE_AUTH_KEY',   'J[8tvCN4q{0dcuZa`x:!_n ~eftsZ%y{Of.7FpdI(XoqWN T+@&&xsE=-IkRk>^*' );
define( 'LOGGED_IN_KEY',     'p{et[*]%8]<k``Ea[J{|s*bJtso99dP2KRK1fsuF.`9(d8yCxttWH^v*T|cRNSpL' );
define( 'NONCE_KEY',         '}QGq@<Z-f0`#-8w4:@wj=SeYqgKPWc4Y07Hs~%;Up`@_g!Xqta_4reMwqrc)[ Kg' );
define( 'AUTH_SALT',         '^7yyR~IyWQYc)bmff)4Asa78/G5_pQmixqQ.@x3&+xVo:BPTs:x$h~X:%=nS;kIH' );
define( 'SECURE_AUTH_SALT',  'A+UZ67ovk&s.Hiu3TDT:|MV(i])MQ/nAI!OZ/h|?&ou)KG%ARvmr-=uM.AW#1A1t' );
define( 'LOGGED_IN_SALT',    'Mlp,s,jWj:MK#-t*>7fmy>T3St!xE`v/=U_.5&6rL5vY9SUEut9-RYKae:HUyLeh' );
define( 'NONCE_SALT',        'EPoR}p/NuMf59W6w5;8WK#NDmh}8~{,j<8} |tuo5h!@7aAZ!:M%~,t]Xio>x.L/' );
define( 'WP_CACHE_KEY_SALT', 'Ym5]*[) _?pRZele@oaK X {`z,YF>c^Z Y1--p,E2o?3b<,+l>WsEt^_S?j@@@O' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/* Add any custom values between this line and the "stop editing" line. */
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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
define( 'WP_SITEURL', 'http://217.160.145.208/' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
