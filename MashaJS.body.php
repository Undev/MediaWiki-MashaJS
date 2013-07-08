<?php

class MashaJS
{
    public static function load(&$wgOut, &$sk)
    {
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

    public static function get_prefs($user, &$preferences)
    {
        global $wgDefaultUserOptions;
        if (!array_key_exists('mashajs-enable', $user->mOptions) && !empty($wgDefaultUserOptions['mashajs-enable'])) {
            $user->setOption('mashajs-enable', $wgDefaultUserOptions['mashajs-enable']);
        }
        $preferences['mashajs-enable'] = array(
            'type' => 'check',
            'section' => 'rendering/advancedrendering',
            'label-message' => 'mashajs-enable'
        );

        // Continue
        return true;
    }

    public static function addingRevisionId(OutputPage &$out, &$text)
    {
        try {
            if ($wikiPage = $out->getContext()->getWikiPage()) {
                if ($revision = $wikiPage->getRevision()) {
                    if ($oldid = $revision->getId()) {
                        $html = '<input type="hidden" name="revision-id" value="' . $oldid . '">';
                        $out->addHTML($html);
                    }
                }
            }
        } catch (Exception $e) {

        }

        return true;
    }
}

