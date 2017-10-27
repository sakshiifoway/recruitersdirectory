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
define('DB_NAME', 'onlinerecruitersdirectory');

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
define('AUTH_KEY',         'g?DD3BD0f?;f,g%YfGH3&P{mjAzFvOoN+B?]H8a{AaC;I4y#~~UY?TQ<gK6L7ZNH');
define('SECURE_AUTH_KEY',  '^Hl@&~<Q+0YRvJh3HkDG?vCn1(`EY~]bpNTsv(<!lA>d7.,EAM/,0KF%RFdPJOwG');
define('LOGGED_IN_KEY',    's3KmO/%DdwC3=I$:>;y:zNd/_X;|u$N0vx`-*F60/*iE+1}=c?mrkE<un1w7KEpD');
define('NONCE_KEY',        '@@E/Qy(qv]]3MIa&7*{!|ERGB||7U4d?X._*1@EPO+aZ%71<F8F*,2^4G[Jjs2Jw');
define('AUTH_SALT',        'S<UHG4PK@E!~B;$m9ob:v1c&?%,[yrQEttw]|UTm/gJvGaO 4jVg&Pp3]*?Jf8x|');
define('SECURE_AUTH_SALT', '.2<?KR5P(Z.mb4[Zqp,}z5cvKZip6hLw$6/q8bj)M]5hpK#$xT/kRf~@huUEz+GY');
define('LOGGED_IN_SALT',   'lKT?>s`GewX{EOaO64Uw%]~L7%$ixKJ@@L_JNOcE*aND`7>-I9&CbVs=9SO.l%LL');
define('NONCE_SALT',       'ME>%EYf+>4]6,*Dx(oxb/o6V];viXjVUH$<<Qdzdw [N|-#+doy5D:Vw4p~wcT^;');

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
