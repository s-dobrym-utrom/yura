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
define('DB_NAME', 'main');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         'rHCDe<QyZh76Y;ON~!0l{erelnd>dB!B~a!;{^/YDeND%x#I&3qk!)RT]=Rc3sNv');
define('SECURE_AUTH_KEY',  'WZg$Rud+{ws|(oDkE$%~WK&?/sQi~4dOvGWnUd>b>chhJma._jYI%%qym}R]h.S,');
define('LOGGED_IN_KEY',    '<xa{Rsz nXRV#.]f,)J}Mpq/6m*F(70k~tf|QMPMgL?Da-W/}|o2sBdgf(FNcH}^');
define('NONCE_KEY',        'ck*>8EQ?l/H;V1>&%_vw(P8Vdf&QIkCua>cM|J3yBmkWDq`d=G< 2`c`NC)GUzEJ');
define('AUTH_SALT',        'HU N0ph/nv[mfwvLM}`;IcC%Zl7WR>fFiy$J=${r11SI$CfcOqa/7k{Bj7Mp5E-e');
define('SECURE_AUTH_SALT', 'aqcap6~L>k+7=,#S[ENQ)Q3I!j_}:uRrtbuDlkGW?HrA5X^jy8lp|t6WScc`/|nj');
define('LOGGED_IN_SALT',   'Iy#[P[RXSq=s1xKNU6@t{sC5^U3l(]ZD;IKqT^@gFkCN1iAdJ{7BU1Tp%uRA.]A,');
define('NONCE_SALT',       '(Yg=03L0Ir=bw^sF9UF_Jp%PeyqHKpkBr:<qF5!/_rDgx}&n*MT+xY:lg4+b0?N:');

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
