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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bookwyrmspod_com');

/** MySQL database username */
define('DB_USER', 'bookwyrmspodcom');

/** MySQL database password */
define('DB_PASSWORD', 'GZHkVjr4');

/** MySQL hostname */
define('DB_HOST', 'mysql.bookwyrmspod.com');

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
define('AUTH_KEY',         ';AY(YGL3l+AFDHwWyz6wCE(O*n`^9MtJuJxB*mE;`ic1QY&bW!f5Zg)jY~2_uQ!s');
define('SECURE_AUTH_KEY',  'P:qg:J/U!kH6Dwwdsbvlxvv:_o+r7udSty+7Tz;73+1AEc9oB^hzfNF0;c*XFA|j');
define('LOGGED_IN_KEY',    'x&US)(z5xe%(sQ7mP4P7)Y`c_Ah9*a&`/^Oj1S26*KmWc^ZPp|8RgsT:0Ta)XJU|');
define('NONCE_KEY',        'ZdZfK_Tt(:FyaINai!/o*mzibqwc56my6F_n9OOMOixr*9XEwhr!6gl7!Rod6"BZ');
define('AUTH_SALT',        'U1M)ejghwvrD//NuzHzs+w&$Z9Z8^?IC)|WeK?eeFD+jRBUbTDNgU1NyacA^vC(B');
define('SECURE_AUTH_SALT', 'rY~nE$(no2W_h9O)1dhOiOwZ#f7`Qy"bcaLx*V~0Li+iJ369dpDC0AVKV#^n9qm+');
define('LOGGED_IN_SALT',   'l15L_$c;EKtdFUkGFh0YzQqFXmk!jNT!Q9FZcVwIxiteeZ9?~IitbXv9qUJUu#U!');
define('NONCE_SALT',       'r7d96Q5sMvrFjVdLEiped#+"rIt$lwFyShPSaj+&@v!K~U4?SvaqKiAO7!QKfJSd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_wb6an9_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

