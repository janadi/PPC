<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
* In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
*
* Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
* Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es auf der {@link http://codex.wordpress.org/Editing_wp-config.php
* wp-config.php editieren} Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
*
* Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt, wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
* und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
* Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
*
* @package WordPress
*/

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'ppc-wordpress');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'root');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'root');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
* Sicherheitsschlüssel
*
* Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
* Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service} kannst du dir alle KEYS generieren lassen.
* Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten Benutzer müssen sich danach erneut anmelden.
*
* @seit 2.6.0
*/
define('AUTH_KEY',         'S1Eyt=`,CO(pfD?qB)f;DhcJl;@_Q+[It$hoK(TvG0c5~IeI7]l2o_0B2W)BxaeR');
define('SECURE_AUTH_KEY',  'fCOn(^(C2:aIE.u)OY[yIQ+akt}AQ<!;,Q.eDf<CLu8;C^u)d#2s]SRRoe!7 +tW');
define('LOGGED_IN_KEY',    '1-DbVh8.VLS}LnaQ+#.4OR#lXgXF>Y#>e`f+:`-P~%dtEz52I.3Pc%#E 9]cdw!3');
define('NONCE_KEY',        'PwKmfOT.jc8hpGx5P-d`y`;Oz3S?l &U}fA^h&-]W_G?+o]I29t-+gNi,/mpQ>v<');
define('AUTH_SALT',        'RtPef-M?S;KLoDU/_RSD/CYW&-Z[!.az]<_]zjl0Y)x-:]2M4gdN+t n=j=Md:qj');
define('SECURE_AUTH_SALT', 'OVSjYyo^=$592?=zlIF3ED7`A,sh ^YX[`A%^|y]Q 5f?gUq6n|-m~(2Gs3!-#j-');
define('LOGGED_IN_SALT',   'TP0ux><is9[S7Gr|{un|_ajN4];*)%g-Z.xJ`(?-U=DzQ}Li0d+/_kTtTt?%4|YM');
define('NONCE_SALT',       'SPgESc+w_oRc>g;CS/1[Zp+c$GBWfm0kW2P9}ig+x?^cb3~TS;GOfU0C4QF^8lqy');

/**#@-*/

/**
* WordPress Datenbanktabellen-Präfix
*
*  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
*  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
*/
$table_prefix  = 'wp_';

/**
* WordPress Sprachdatei
*
* Hier kannst du einstellen, welche Sprachdatei benutzt werden soll. Die entsprechende
* Sprachdatei muss im Ordner wp-content/languages vorhanden sein, beispielsweise de_DE.mo
* Wenn du nichts einträgst, wird Englisch genommen.
*/
define('WPLANG', 'de_DE');

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
