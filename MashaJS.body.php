<?php

class MashaJS {
  public static function load( $article ) {
    global $wgOut;
    // Internationalization
    // not used yet
    // if (function_exists('wfLoadExtensionMessages')) {
      // wfLoadExtensionMessages('MashaJS');
    // }
    $wgOut->addModules('ext.MashaJS');

    // Continue
    return true;
  }
}
