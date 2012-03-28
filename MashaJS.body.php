<?php

class MashaJS {
  public static function load( &$wgOut, &$sk ) {
    global $wgRequest, $wgUser, $wgMashaJSEnableOnEdit;

    $enable = 0;
    if ($wgUser) {
      $enable = $wgUser->getOption('mashajs-enable');
    }

    if (($enable == 1) && ($wgMashaJSEnableOnEdit || $wgRequest->getText('action', 'view') !== 'edit')) {
      $wgOut->addModules('ext.MashaJS');
    }

    // Continue
    return true;
  }

  public function get_prefs( $user, &$preferences ) {
    global $wgDefaultUserOptions;
    if( !array_key_exists('mashajs-enable', $user->mOptions) && !empty($wgDefaultUserOptions['mashajs-enable'])) {
      $user->setOption('mashajs-enable', $wgDefaultUserOptions['mashajs-enable']);
    }
    $preferences['mashajs-enable'] = array(
      'type'          => 'check',
      'section'       => 'editing/advancedediting',
      'label-message' => 'mashajs-enable'
    );

    // Continue
    return true;
  }
}

