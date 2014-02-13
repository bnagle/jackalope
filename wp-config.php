<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}


if (isset($_SERVER['PLATFORM']) && $_SERVER['PLATFORM'] == 'PAGODABOX') {
    define('DB_NAME', $_SERVER['DB1_NAME']);
    define('DB_USER', $_SERVER['DB1_USER']);
    define('DB_PASSWORD', $_SERVER['DB1_PASS']);
    define ('DB_HOST', 'tunnel.pagodabox.com:3306');
}
else {
    define('DB_NAME', 'jackalope_db');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '@_ 3DfO*-Vtp[P[?bVoD(ghboHK%Ma{|crSjd@CeYqZ:aSPOuZd;m7VlS|9b9#tO');
define('SECURE_AUTH_KEY',  '>WQeJ#1~WqCj-q#lZ|kz_FXu!6#47O .+`s4e)T&Eb1%#t7K7C,QM&eIyg)[u)<f');
define('LOGGED_IN_KEY',    ' V/X8+6?zB}Z<i-_c+}b!&L;zkvsB`Imw@Gqh#EO7.p??GD}3]Ga5Gz8x/*mqv>L');
define('NONCE_KEY',        'mA_{1;F~~R01y6M+P1Bs6]5SZo<K~Pk4K@88_XQ#<-O{|%a{Pb>c)URnL+Tp|&OD');
define('AUTH_SALT',        'Y&ewQQQ/{q5N;*v5rhrHyeHND*EmSDwHDf(!vc22.ft=^QkMEy]d9;v_{V)CHz-Z');
define('SECURE_AUTH_SALT', ']Mz^sfUm/rNQA${zO)ZZ[_9boOfp`.$J!K@#(@*v-Y+G`#BCd#>vd=TA@X771dX|');
define('LOGGED_IN_SALT',   'kw[=/OrAu|?E-%nXl>@Nhp@7)~0Ft|Ihs*jb%hUCN5TW|s023;)|jd<;Bai-<(Yj');
define('NONCE_SALT',       'ML+9^v-|>h+f:YsBLX:Rq-ohoS%b_0*Kx.|w*uUP[*wLT45dUA&[ljn<rVtHS/zY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', true);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
