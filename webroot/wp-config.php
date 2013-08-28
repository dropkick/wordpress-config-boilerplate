<?php
// ================================================================
// Define server environment based on which config file is in place
// ================================================================
define( 'DB_CREDENTIALS_PATH', dirname( ABSPATH ) . '/config' ); // cache it for multiple use
define( 'WP_LOCAL_SERVER', file_exists( DB_CREDENTIALS_PATH . '/local-config.php' ) );
define( 'WP_DEV_SERVER', file_exists( DB_CREDENTIALS_PATH . '/dev-config.php' ) );
define( 'WP_STAGING_SERVER', file_exists( DB_CREDENTIALS_PATH . '/staging-config.php' ) );

// ================================================================
// Load DB credentials
// ================================================================
if ( WP_LOCAL_SERVER )
    require DB_CREDENTIALS_PATH . '/local-config.php';
elseif ( WP_DEV_SERVER )
    require DB_CREDENTIALS_PATH . '/dev-config.php';
elseif ( WP_STAGING_SERVER )
    require DB_CREDENTIALS_PATH . '/staging-config.php';
else
    require DB_CREDENTIALS_PATH . '/production-config.php';

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// =====================================================
// Table prefix
// Change this if multiple installs in the same database
// =====================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// =======================================================
// Control debug mode and bug logging based on environment
// =======================================================
if ( WP_LOCAL_SERVER || WP_DEV_SERVER ) {

    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true ); // Stored in wp-content/debug.log
    define( 'WP_DEBUG_DISPLAY', true );

    define( 'SCRIPT_DEBUG', true );
    define( 'SAVEQUERIES', true );

} else if ( WP_STAGING_SERVER ) {

    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true ); // Stored in wp-content/debug.log
    define( 'WP_DEBUG_DISPLAY', false );

} else {
    define( 'WP_DEBUG', false );
}

// ========================
// Custom Content Directory
// ========================
// define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
// define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ==========================
// Move the uploads directory
// ==========================
// define( 'UPLOADS', '/uploads' );

// ===========================
// Miscellaneous handy options
// ==========================
// Modify AutoSave Interval (default is 60 seconds) 
# define('AUTOSAVE_INTERVAL', 160 );
 
// Limit post revision history 
# define('WP_POST_REVISIONS', 3);
 
// Empty trash more frequently (30 day default) 
# define('EMPTY_TRASH_DAYS', 15 );
 
// Disable theme/plugin file editing 
# define('DISALLOW_FILE_EDIT', true);
 
// Disable plugin and theme update and installation 
# define('DISALLOW_FILE_MODS',true);
 
// Set cookie domain - The domain set in the cookies for WordPress can be specified for those with unusual domain setups. One reason is if subdomains are used to serve static content. To prevent WordPress cookies from being sent with each request to static content on your subdomain you can set the cookie domain to the non-static domain only. 
# define('COOKIE_DOMAIN', 'www.example.com');

// ============================
// Pluigin-specific definitions
// ============================
/* Don't load Contact Form 7 script/style */
# define('WPCF7_LOAD_JS', false);
# define('WPCF7_LOAD_CSS', false);

// ===================
// Bootstrap WordPress
// ===================
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');