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
define('AUTH_KEY',         'N6c W*WF>3?G^Vk9i=!VMX5]*NUT>j,PvWkiM:9cu^e)Jq]w!h]p`osb /l7npwN');
define('SECURE_AUTH_KEY',  '@Uv%}V-2=y.q1rN6D.R$g>Y6P; JycSz-#j0]wt]UAIBW-;~&cV$?GHO-s~cmbNZ');
define('LOGGED_IN_KEY',    'i<6Ir07lj6MgoW/Ol~dUW3F*2+o^)3OnZ}w]*~Sbsk%H%#BR&m[&/W:G,8s9/ZUL');
define('NONCE_KEY',        '{& _`o(GLYxF#rTYB3}-.Hmdm9Itx@@~{`*_T&%)3m$YN gtjd4Ch^zkNjo1L(s%');
define('AUTH_SALT',        'ozKI!q4?;}pN=eZVu;_/wY=eXvIlSN-HG4<~axvx8!8akGvVJYt~@g:t_]rUP*:U');
define('SECURE_AUTH_SALT', ',iUgeAM]mHps|;%(1wiSc(bWyI$aG8qUbSk9%$J-0?wOgoT3ov7XVf|`f[QDfexm');
define('LOGGED_IN_SALT',   'z-6F:6GF8s0,=caNS(6|.b;qnYyf9`^+g%XGxSlAGX2I2NoOM:WLZr8&f=ChI(7y');
define('NONCE_SALT',       'f7_U6:~>gG`k1[clIr+x7:wQ%X#MGNE4 06XiL7;PrHN#o0.MiwbFP&HfAA[T6k8');

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
