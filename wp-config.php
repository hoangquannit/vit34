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
define('DB_NAME', 'wordpress_demo');

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
define('AUTH_KEY',         'kesBFr9|wX#X]`k]r[YB;RmuTD*-c.>|9+HsMH6l0WcMJnk*|:?;9Q6)ay7tx+=O');
define('SECURE_AUTH_KEY',  'Y^i;gD=[D:<f*U*SENt6O~(ct7Yl48eM#e?Y43fC*K$s+K^G.a6`|.+;~gEQ97F!');
define('LOGGED_IN_KEY',    'zvj@7`%#oY/e}7@_0aog&rDN<=3%VG(f~<4Rb7IxVcP6J$y&pKk~w&9*pW!(?L9*');
define('NONCE_KEY',        'pAtx-SVY3d@yah$6Z`( .%QB-, ~{<Q<DHg^bjkMpwuyJ+fAI{<DcXno,`2yz0FA');
define('AUTH_SALT',        'HY8!ZeLpwY{A231&vnS@WX+NDx>LdG6dOk/6rGrtiEGLXR`ue!ykl!8P#mw/B4Oc');
define('SECURE_AUTH_SALT', '@0hZ!~}|xN rMU%`OuD;;}rn(E=Qgq=3qfWy5_)r83IpX;VPefP[4E7=*@=uZf48');
define('LOGGED_IN_SALT',   'nFm5X!{x3TO_%j}?&lH*OVPist/];tH! eA}h@F6+zcQP-dm3V<{vtya@ws<7x%`');
define('NONCE_SALT',       'z=L8-/$%4lV/O7V!iY9E}{-hc!Ne:ZH~Li}`oJdu@>KC.Fh.zr(?e|CTh{EW*p;r');

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
