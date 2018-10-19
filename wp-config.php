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
define('DB_NAME', 'inception');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G5*xu&p(N5Et`Ud181N7TFpT)I7AN}YF -LL&T`cPHwT$@w[q-@d[`Q(VG0A=2`M');
define('SECURE_AUTH_KEY',  'IWyMBR`Ml>g,+1n2IlpQh9fmp]H2ga{/#V#CxWl^b%IVm&]c{?B|@WU_5}Y$+2u?');
define('LOGGED_IN_KEY',    'Y!D8R:SPu>9TVJK*lzyo&u*;ojFfz!`Zh|F|` LpIPCdE0fbF|Z_~)wJB0:H=@)?');
define('NONCE_KEY',        'tHKO LSWpT{WB~E(N7cgn:+;T&C}9<,YYd57w5;M)8V{/DlI+P&v9m+@#l=)GF,|');
define('AUTH_SALT',        'J]`l&~=gVFi%J07)Zg0QeGkvaZ~Xq UAUwxc,]LAmh8[97<f<b377RN.QC@:/{fX');
define('SECURE_AUTH_SALT', 'BUBe}]NK~Vtr8s=Q<u8-LIYjq0e5&qh@r<[DB^&CI)>*RXo;=<Qu3WpOBjP|yLk:');
define('LOGGED_IN_SALT',   'uO)~6Q-Z`-qW$%:w?XQnAvNa_9xv}8@9J  oU:jdY/G}{`=o6Z=|16d;E.h%TfQ4');
define('NONCE_SALT',       'mlL|%,ja|P%_qNR3ieXq=]#aCZ$55i9Qc/s6%&m=hzkw.~QR@GK Rwu?Mk5BUY|y');

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
