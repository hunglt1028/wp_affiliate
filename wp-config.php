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
define( 'DB_NAME', 'wp_affiliate' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '&&%m`h{ [Sv3:q>PhlZMRiMo6}>qzJJ5i9K<H*(qLu,IJ04*a5IFPKB77@5boRBq' );
define( 'SECURE_AUTH_KEY',  'uGjR6{VklO1v<q8.$*@aEqq*h/eca9K!#$TCy3erlaRP{TqPpt~qdP8H84,_[4x#' );
define( 'LOGGED_IN_KEY',    ' NlD)O?EAg)BTg.KkG:`;fqcP)t-LtDublfoD^i;e%M&] 4i3=c?.2]l&lB?I~Sc' );
define( 'NONCE_KEY',        'Y!vc`eN}3=fUw7F@Kf |AQ/TfFqkSS(M*.. =O`lVTMF}PCYQbd X.:sQni9S5[]' );
define( 'AUTH_SALT',        'lyVk&x`0@MnQq2pmh`lJ=,I&an#xrmE$;%WNE?ucPE-U&.dEkZ%1c9ElW.vS*9Qv' );
define( 'SECURE_AUTH_SALT', '_XL8B`4FJE46[nDd)XNGdco|aq9Ht=z8dh! #^8uxH<VIk 4(*lGFws~,qFTYJ[l' );
define( 'LOGGED_IN_SALT',   'g?vW6,(3ZmEr@2*tqv5 C7v<)r_mBQ{<6deNB>:nB@8!R/Y8q!!Z%z[8;CUY6pV_' );
define( 'NONCE_SALT',       'EJD(+( <bC 2T(tQB93&kdp.)K$Q/uB2<Lm{|U%Qj1;uL+`Sxuw%ZOehud2dRviz' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp';

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
