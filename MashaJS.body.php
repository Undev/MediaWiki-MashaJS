<?php

class MashaJS {
  public static function load( &$wgOut, &$sk ) {
    $wgOut->addModules('ext.MashaJS');

    // Continue
    return true;
  }
}
