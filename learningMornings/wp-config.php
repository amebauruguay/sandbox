<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp_curso');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', ')|YHPl+uIP+61*wz+BH 5i+lfMwlUqyc1tDt_/X#Qup<AV[-w#Q=z4xWH!Hfbed|');
define('SECURE_AUTH_KEY', '(_74,U].[sFYR*ltFy2QS@6Jb+3nAj=+=XOG(G2DKdsrFzIjo&YC]X{qy$<HW&2M');
define('LOGGED_IN_KEY', '`){I~#a)5Z0T^j wd=W^_N|.LUt$h6Wk!DSo)lM6Zb>SMtcRcyooeQtGrM-wM^q=');
define('NONCE_KEY', 'tR<<?)w:@+mU4-%T!>xyiu#%Fg}rvzPr?JpZ7KvAT[&[sy,OnAJt?:[l- 1`!1D|');
define('AUTH_SALT', '1pJ+Q5^Vd{|7n>kh$:rSs+vXM?gh3AN:KP-`I-W7V)`qL%3ej0FQd?a|)4XQ8NC=');
define('SECURE_AUTH_SALT', 'w2.dEw?L]>p?NE&>xNCFEBE41C: 8a-|-90;?Z:RJQqc!|Q]G-.1,{xz?AfVv[+n');
define('LOGGED_IN_SALT', 'rfuD+Cv)HeoOn5[@`kA@n5nK^~EV5= k~izY&I-S/NZEy,d#G1ADQ-.wYI6--Ae]');
define('NONCE_SALT', 'o#H0TQU$wxtZ)?871Hg|y:0?PfCplcM6EjA_RbCYx+dAz(t5ro@EF[POk{*]@vqK');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

