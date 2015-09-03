<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ankitpa1_foodorder');

/** MySQL database username */
define('DB_USER', 'ankitpa1_apuser');

/** MySQL database password */
define('DB_PASSWORD', '46868ank!@#');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '-!hN]0Pc6t(i||hu0zxPy$(f&#kH{P,x5XF%.BvmE t;b#h}R3];Er(1S(B=;/O%');
define('SECURE_AUTH_KEY',  'PyA6W;D@4_~Jmi+;<D0xFrO{zb0Fu{gx6kc5EyERv)P6I1c9#qiLMi}e0 *o_+^s');
define('LOGGED_IN_KEY',    'E>Pa1$&FW+w fpQmAA-OnNG>k%j.Mx6aA_o{)K+>(G&;19~y9b/XAx`S/xE67&QT');
define('NONCE_KEY',        '-79M-m&|<YwOY3E<aOM3iO;+Ms_IeG:xUh;FI,74*72!=gswFKcwyoynXmV##s$e');
define('AUTH_SALT',        '#+)Ft0)`[tR-9E{o1hSe-Ga%1/]A=I|DNcSHa]WTu2jX1a#-F}8A-ne 17#+-wPF');
define('SECURE_AUTH_SALT', 'bU8r2->5RL-q-*nPY2a1;*!>+GXAkH@X{FPA%4Xotc2lZA D:(fJ3d~grlv4&6iV');
define('LOGGED_IN_SALT',   'S0Wjc&z*qlr2tzLJ7=`!&G=NCV;; SAT`$H:&/sk8#qk$_|n/T@kmXJD}z6~RQGp');
define('NONCE_SALT',       'ru2WoOY_T)(dL1b;ghj/$-A:0R.KQ-#=nV6YX9wMjNIZ:`A)bXw2m^$QTr_S8`sx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
