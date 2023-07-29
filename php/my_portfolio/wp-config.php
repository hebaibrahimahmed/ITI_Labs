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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'myportfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'P4Wd(VxK*p}4?^sBgQFlT}FEafG8]0-BVV*9*;Rbt%xf,xKP{|.*NiV3voE7WGd}' );
define( 'SECURE_AUTH_KEY',  'Qlfm9fufE`#:VtRZRFHSv/7}BI@#?/B8<;C{:s3_>@A*YX^envyPUr^0*Ji+&yS%' );
define( 'LOGGED_IN_KEY',    '2`M]Ue#/o=zqyd$m@twV[u`+mN7x+9{qk*5i|LtdB|,Ol%G3m#SqxeP)F06:[q]D' );
define( 'NONCE_KEY',        'X!-ty}WVpdgkh-&34_|vi92o>)S%wBpfo}eaUDE)@/zKEp!k_s|t_#b<m!Y|wc>x' );
define( 'AUTH_SALT',        'Y@ig?1^${#jBfAhzh8p5T,fD71]-[kB:[QK^///XIF?icU+oZz-dcyeawMNNHFD}' );
define( 'SECURE_AUTH_SALT', '601VOZ~90araDdbvOJ9&NKkQ!lSC]Z$EU(^QJH_G!bv!+s`w4OXsoR.*9|c `DwV' );
define( 'LOGGED_IN_SALT',   '%,n0;~|FYDpL#z&[A#q taQ?B_Tc?ufi NL75itcerX^T!7e[n6p$:fbXY2faM0M' );
define( 'NONCE_SALT',       'FI6::*>6V!Z`/E N)]7z SM1}R{=WRUGgZW^_Ug3GeMVkE&,q:a@&. yw*iO2C&3' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'iti_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
