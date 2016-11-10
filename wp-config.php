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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'w!m7sDg29``J|99i[QjXODz=?3 eu=bE<rel#RJ-PQmjam+<v1Au%I!Gr}fi7g$/');
define('SECURE_AUTH_KEY',  'hxN7E!fRb{90_x4P0hV(;)Q=P5{UX [_KsKq !Rr@W@VM,&Vc=p(GZL?GEMD`@7~');
define('LOGGED_IN_KEY',    'y3.(f8dv 4K5Wb[3Jp)4Yt?Drb`ug=^]4tf+sx#8=~0n{:d?.e5k%O@G1M;Y:wH!');
define('NONCE_KEY',        '~i[cRw$_^b`]zsw{KtJBaT;uRA6mnFjby}tw6}bR%o]$5r;BWn6>aJzwr(5~!%vZ');
define('AUTH_SALT',        '%X-qzRa{{n&cU3{1rz7iZ#BG8}9hp-qlb`xl6a8y+)TH~IvrC&%Ef@nOQ/W(|XWp');
define('SECURE_AUTH_SALT', 'rFg>xk`np)V5mkRy2)PYiUjiHeqV1*<8_IX)S>[Cme>6I8SV}T./-kA( XB3m@W(');
define('LOGGED_IN_SALT',   'YRdE!;f<Pe?=T495ORT2{[]dK!)Iv1g{<nTSQIc|KeZ+e)MRCdqWjJ|5wzSWe)a ');
define('NONCE_SALT',       '3u{jS;i;BGx5@vt|CJXFPB(3%uU<@NW.!fK.2nNJhe*D^iq5oryx_C9^4Z:3Sj?!');

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
