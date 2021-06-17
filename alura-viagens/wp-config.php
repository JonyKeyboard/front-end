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
define( 'DB_NAME', 'alura-viagens' );

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
define( 'AUTH_KEY',         'kX1:[wm;X%Yw3mX|b%AFI[0I_+?|e=H947h.%Q2D_ldK<=p<Qq|B61.=(%W./ldL' );
define( 'SECURE_AUTH_KEY',  'r&[b,5&<|Y%0bw:j=;%2X~lHla&DxY+zsKR:gdjjEiz0Jce*B!,Ex]Y8>`tM)EG(' );
define( 'LOGGED_IN_KEY',    'SU(0r!c8,+7#O82?,UYWD:q7D[mAK)a@-jBI$8Z~u9dx-6;g~`E ^5 =aB;x_@/e' );
define( 'NONCE_KEY',        'lc #vj.%3PRpteZYpF9Z)DDwro?y$^.tY$_)O=|KMU$LUD|K_7iEcv|[`do,qs=_' );
define( 'AUTH_SALT',        '>5wuO/G alVKfDfBe_qW5Q~P9_gGM@C]CL<nq{3=$y#$A;HD>$a;R8u)pYB)|!yo' );
define( 'SECURE_AUTH_SALT', '^]Df#6pz[0.l(*B9rEdp|i[TfAT&_Nb8l8DIZ4U*=#`K]%9$^lVMJ6|sb/rZf1Ds' );
define( 'LOGGED_IN_SALT',   ':?mH1&cwJoyfp //T2F+vn:t`PJ|>Q=yOm/DVn-,=WXLZ4f#i+4jDfejnTq6E+X:' );
define( 'NONCE_SALT',       '#fweOP~cq},oTAHa[~[n]tf;,zUhy<]CbKx2[FiP):?2hv0S2u(C)61pDb]Ak8!p' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
