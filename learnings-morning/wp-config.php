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
define('DB_NAME', 'wp_curso');

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
define('AUTH_KEY',         ':(EZ96-ZQlGE>J`9r/9*53S[j=nR+dwyicrO^cY  6Aly:g.ul&Z+1gg+@qT0HJg');
define('SECURE_AUTH_KEY',  '{]k-&g{%oFLtO*2Lm3dBn*7=00B|lXWqy.9pl`Z>n.g!&~@JXH|B_Wie;|G;~q )');
define('LOGGED_IN_KEY',    ')a&Rpb[9C>C3+/G{ltYL[`?S>$I1xx;o_3-B]Jl~m,?E!Zsg J<.e@#}Q+B3/l6c');
define('NONCE_KEY',        'nFqF||T)BqeI(v`X_cHd>Bjlh.n2|W6OUMJ`ePokM&.G+2h* =eT=2c[<g2`xFX_');
define('AUTH_SALT',        '9g*||-a!6m2RkBR[h/0~}cdX$?SE4sHnAc?0(as)e8Llx LS]AcH:IA8TX!#Tb-d');
define('SECURE_AUTH_SALT', 'Y^,gDy--@V*V?{j PraH;5EVC#:R5aC&hP&$N/~ETg+[vLC@nEn#dG,0 USyE8^i');
define('LOGGED_IN_SALT',   'rr{H0gFjW8&}0T[EwY5iU+n/R-Jj|p2o=Q$t]1m-eNs2&>wd[psOlb;Y;XuMqN*W');
define('NONCE_SALT',       '-]:O6Bp~v}v6=+7F6-( 18`XoJ`W[4Q6crtd/5;T!w-Q;eeQI,4xCS92y-q SfU@');

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
