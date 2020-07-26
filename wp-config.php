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
define('DB_NAME', 'homewordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_AUTO_UPDATE_CORE', false );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#A&@vd[_bE[e(z1`:_DCD=n*go[(O$+N7!]12Z<+I%pC+TDfL-Q:>05_ZZsQ2@Ru');
define('SECURE_AUTH_KEY',  'a+b<kL+KfHnMvl#XG[jO`Oz%m1UG> fGSS~p[75l)JrLYg}b>vGnRIzL).n*!AR?');
define('LOGGED_IN_KEY',    '[*RL0X}ZLG;yaN1r-xk&?S[T@U,:V9{44f-QC>+1cS G=K0>*?o#H y@_<F&Eq2k');
define('NONCE_KEY',        '{=#)NZG2]/Ve4+o6Q)?fE>.s=-v;zS?!FMcCN=>~:^}qB/5o5R6_Yf$t#,^q^^S/');
define('AUTH_SALT',        ';4Sua48;!,Tp)<cxbpn{O9-*L6U.2m+QdS;ye{K= GYkb)CiQDV +_y!t=(^So}{');
define('SECURE_AUTH_SALT', 'B74S8?stw0f@`D0l=F|:TrM[V$)dn&*~%i2sIjUxxbo(:+y8`jK@`gf|RFWc/sNV');
define('LOGGED_IN_SALT',   '}]YJ.(Cu*>CLg8A0E{OXJbqw/TFN, DSw,ztS67GymI:t/%zY!qZnW9ixpZVaM#6');
define('NONCE_SALT',       'z3%;_OW~:{2h:i@.OCw@BR8v@`;p~Hc4=[>LjmBrN8Bt!ta)FUdwL-LJ>H;Ny+-?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
