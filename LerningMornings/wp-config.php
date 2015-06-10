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
define('DB_NAME', 'wp_lerning');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'p{9V]]([,z}>1u%3|c<74l_USe&6|edYv&K}!dDXD(=R%**oNJA vB(p?bS+0yQn');
define('SECURE_AUTH_KEY',  'VZ+(~X?>{ty.9n^Q!7u?F-HG,<f|/bVcnepP+j0p$15g:zQ+3c=!k8-/YGG+H:KB');
define('LOGGED_IN_KEY',    '_el^)-l7r:@DBk~W^ @l>3nRX-D.aKYQg1Om/6*,p5#+Bvg%ozbgX}gC53=me57P');
define('NONCE_KEY',        '~4Y(}s%v1%<4{O?ba0n,^L(]s SH>BG7gY0&b+|v{#--$1&#lRQ~D q,,MBPM/6^');
define('AUTH_SALT',        '1Q2.KOaDNsQrf32N3|-%F7`3tXdooz+sRtdv6@q4%XqOWXZO,/@<~I6VLJc-d-~_');
define('SECURE_AUTH_SALT', 'sTkV8+N4!;JSL&@.-[e=}={cg`gi/D1v4M52*)/G6YQ7tT.OD^c?[)BEB*($ RwN');
define('LOGGED_IN_SALT',   '|z>h)wDHYD+Vq@FI;KL))*}`7{ux8PK]|FyHH^VU/(RYa.>S1]R#Q/M&uM+:+VkD');
define('NONCE_SALT',       'avZ>Dh-G_|R11d/|23o-@8~VSMXB%HmX#^{uj_qQbbyTW_L$d4U-4V5g+l1G~e!X');

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
