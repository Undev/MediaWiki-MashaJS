<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the file directly.
if (!defined('MEDIAWIKI')) {
  echo <<<EOT
To install MashaJS extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/MashaJS/MashaJS.php" );
EOT;
  exit(1);
}

$dir = dirname( __FILE__ ) . '/';

$wgAutoloadClasses['MashaJS'] = $dir. 'MashaJS.body.php';
$wgExtensionMessagesFiles['MashaJS'] = $dir. 'MashaJS.i18n.php';

$wgExtensionCredits['other'][] = array(
  'path' => __FILE__,
  'name' => 'MashaJS',
  'author' => 'Akzhan Abdulin',
  'url' => 'http://www.mediawiki.org/wiki/Extension:MashaJS',
  'version' => '0.4',
  'descriptionmsg' => 'mashajs-description'
);

// Register hooks
$wgHooks['BeforePageDisplay'][] = 'MashaJS::load';
$wgHooks['GetPreferences'][]    = 'MashaJS::get_prefs';
$wgHooks['OutputPageBeforeHTML'][] = 'MashaJS::addingRevisionId';

function mashaJScripts() {
  $scripts = array('MaSha/src/js/masha.min.js', 'MashaJS.js');
  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
    array_unshift($scripts, 'MaSha/src/js/ierange.js');
  }
  return $scripts;
}

$wgResourceModules['ext.MashaJS'] = array(
  'localBasePath' => dirname(__FILE__),
  'remoteExtPath' => 'MashaJS',
  'styles' => array('MaSha/src/css/masha.css'),
  'scripts' => mashaJScripts()
);

