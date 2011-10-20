<?php

class MashaJS {
  public static function load( &$wgOut, &$sk ) {
    global $wgRequest, $wgMashaJSEnableOnEdit;

    if ($wgMashaJSEnableOnEdit || $wgRequest->getText('action', 'view') !== 'edit') {
      $wgOut->addModules('ext.MashaJS');
    }

    // Continue
    return true;
  }
}
