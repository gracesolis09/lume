<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbxzjfoa82copt' );

/** Database username */
define( 'DB_USER', 'u3upc0gxpti9m' );

/** Database password */
define( 'DB_PASSWORD', 'owfnmseg550j' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'O|F2lC7~WLq7OO)Z)PL K|[?C]X&`z3N1K9**^aUu~!o`?_t7e}z0SAJ1EzAiFi.' );
define( 'SECURE_AUTH_KEY',   'qJe$%?s?f-xhesZ7O#6fUmOHw0SpP<d3~O{J*o6E~s4uO{,|l~W<y!5rMmMKPv7X' );
define( 'LOGGED_IN_KEY',     'tnC-m3P[]=#_V;c_,bJf.ND8n&G~g~Qedv=YQb]V=/.Te8K&>ZiF?d5GqtUVNFB1' );
define( 'NONCE_KEY',         'DY%z-en1^~w_qF*v-&:(SFjxq%pN5LT,]E?{xh8s1/vy7h*.y4p=)tmq@OKZC)}7' );
define( 'AUTH_SALT',         '?DrU=$))FhE)N:Bctska0szfL=~Oa(259m9@0EqSBdH>)=4;FNCW+M^7@p)SH&A@' );
define( 'SECURE_AUTH_SALT',  'y[2-m678(>M!;=;d{9<8;)sqe#-+xqvkN[K@D^H>R;Afi^(k7`hmZ4bB8~nP$JZ}' );
define( 'LOGGED_IN_SALT',    'w2FW@+d<x)T_) ou4DD.vI+_].DW1Hf!iSm527jYxGl*J<cz3OIPgX>[DQ2CZ]Ue' );
define( 'NONCE_SALT',        '|C/2W#S)ofMRe|u{t-_=*|5ci.DR3mB*[hmSm=4gWd0:Jc/qiWRj9TNvlMyTQ+x}' );
define( 'WP_CACHE_KEY_SALT', 'VoReY;Xg ]#[x<`vTO?<_~Cnxj&~GKO!1sXyCS<NS0~_=3I.HY9P,?D}qIY.7Pd(' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cjf_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
define( 'WP_ENVIRONMENT_TYPE', 'staging' ); // Added by SiteGround WordPress Staging system
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
