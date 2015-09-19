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

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'artandtrip');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '');
}
if (!defined('DB_HOST')) {
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
define('AUTH_KEY',         'FN#%QL6hBk 7WGL-+(pbd6ecoj~/0q]LK&?hsJ<n6n[OKcPPaRgeY:_TT)zY2*)e');
define('SECURE_AUTH_KEY',  'm*_]QSzP0oHpf5Zpel3r6[DR(:f[1w{+Ma7.seh`6^OSO5 Y)EJ.}iqlBR]irZ*G');
define('LOGGED_IN_KEY',    'La9YnFg+Pfp|?t9&ec_aR{`H>Q&7**Qu*&I<F&+n6~sXoj9ASh ~L[H}N+?ezax-');
define('NONCE_KEY',        '3;$E%68N,D#d<.scvgG,-C56!6YM~FTv=--Jb-SbBJq@=[[.WW1nk2h!.GO{/A&F');
define('AUTH_SALT',        '+5PLD9E@,qSK^_tyBfiGRfi%-skvB%Hit5kB$+r|N=$0v%WXOEt85p}t.ZI;>GCv');
define('SECURE_AUTH_SALT', 'u|pjCJZjyoNSPlZ2|x<F**R~eTS|6:|YMt!|s8}Te9_7O1=Kma+uF):~+YSLRO2-');
define('LOGGED_IN_SALT',   'mNH2fSExb2dezD2=KaS<76`]G]!&n-?Bn&U(p?-P_Ga9,zm9YK=s/y|>Ls}p->rD');
define('NONCE_SALT',       '<_}]r@9-J+4YYZ*K@^Uil9Dq/ANtL_wZa+9>S9YSC2Sdxp,fxr~@I@E cgGw&ycr');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wx_';

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
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
