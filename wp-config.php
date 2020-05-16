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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'alabamadentalassociates' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[y-w:k1]yI*Gxre9Nz3y1u,n^n}vN<g^,%Ri.R5RKv>cDt60HN/p/-494[78t!BZ' );
define( 'SECURE_AUTH_KEY',  '5ZTs~T;GONbrxj,c-Sc5!:CP[Ts0d_jZTxmTMPm7ni8Mi;ABG5Nm3#v>>LF5&npP' );
define( 'LOGGED_IN_KEY',    'iFP/sdA*bwI(g#QHp0e%.J!nD!3{}ryYyAN#V,~9ux2J{wyEd.@0Y{m?q}{#1QWW' );
define( 'NONCE_KEY',        'j9wMMC>qM57:h^2CVGAYdTwyypZHgQA]9sC)QZ7j6ulk^oxTT~`Hti5djSo<O?oJ' );
define( 'AUTH_SALT',        'm+wgnW_)@_u:ike6f@z&8|Gk$Mr_xk$SeDWk*J9r=z{AVngWmW!<3sFOiUc7Ln6N' );
define( 'SECURE_AUTH_SALT', '3  fM$#I yxl_C+CG{26LZ@^7Kfag?{%$r0K5+PD7RDEjs.9{nq,z8nsG)/.iF$5' );
define( 'LOGGED_IN_SALT',   '97{Iu{NBZ?<} vYvo?`4RTn:L1-pDe2XV_:24ou{J_LbgrfpC&4Lk&W58-~?gOKQ' );
define( 'NONCE_SALT',       'L[M:TWC[h O/PN?EWHQ!|^j!p=mn[6~WoxV7b+EB+,0@J(NEM4=}e|7SHD2x(*?I' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
