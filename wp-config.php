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

/** if using a sub domain for your staging environment, ie. clientsite.yoursite.com
 * assign SITE_URL_SET to your domain name.
 * Else if using a specific URL for testing, ie. clientsitedev.com
 * assign SITE_URL_SET to your testing domain name (clientsitedev.com ).
 */
define( 'SITE_URL_SET', '***' ); //Development staging environment URL

/** usually local setups will be placed within the htdocs folder
 * Sites is for Mac setups
 * htdocs is for xampp setups
 * wamp is for wamp setups
 */
if (stripos(__FILE__, 'Sites') !== FALSE || strpos(__FILE__, 'htdocs') !== FALSE || strpos(__FILE__, 'wamp') !== FALSE)
{
	define ('SITE_TYPE', DEV_SITE);
}
/** looking to see if this is the staging environment */
else if (stripos( SITE_URL_SET, $_SERVER['HTTP_HOST']) !== false)
{
	define ('SITE_TYPE', STAGING_SITE);
}
/** otherwise, assume it's on the live site */
else
{
	define ('SITE_TYPE', LIVE_SITE);
}

/** we should see which database we should be using based on the site_status... */
switch (SITE_TYPE)
{
	case DEV_SITE:
		$active_group = 'local';
		break;
	case STAGING_SITE:
		$active_group = 'staging';
		break;
	case LIVE_SITE:
		$active_group = 'live';
		break;
}

/** local development database */
$db['local']['hostname'] = 'localhost'; // database hostname
$db['local']['username'] = 'root'; // database username
$db['local']['password'] = ''; // database password
$db['local']['database'] = 'database_name'; // database name

/** staging database */
$db['staging']['hostname'] = 'localhost';
$db['staging']['username'] = 'root';
$db['staging']['password'] = '';
$db['staging']['database'] = 'database_name';

/** live site's database */
$db['live']['hostname'] = 'localhost';
$db['live']['username'] = 'root';
$db['live']['password'] = '';
$db['live']['database'] = 'database_name';

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('DB_NAME', '');
define('DB_NAME', $db[$active_group]['database'] );

/** MySQL database username */
// define('DB_USER', '');
define('DB_USER', $db[$active_group]['username'] );

/** MySQL database password */
// define('DB_PASSWORD', '');
define('DB_PASSWORD', $db[$active_group]['password'] );

/** MySQL hostname */
// define('DB_HOST', 'localhost');
define('DB_HOST', $db[$active_group]['hostname'] );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Temporarily override the wp_options table value for home with current URL. */
define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] );


/************************************************************************
 ========================================================================
 ************************************************************************
 ========================================================================
 ************************************************************************/

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '***');
define('SECURE_AUTH_KEY',  '***');
define('LOGGED_IN_KEY',    '***');
define('NONCE_KEY',        '***');
define('AUTH_SALT',        '***');
define('SECURE_AUTH_SALT', '***');
define('LOGGED_IN_SALT',   '***');
define('NONCE_SALT',       '***');

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