<?php

if(\Contao\System::getContainer()->get('huh.utils.container')->isFrontend())
{
    if (!isset($GLOBALS['TL_JAVASCRIPT']['modernizr'])) {
        $GLOBALS['TL_JAVASCRIPT']['modernizr'] = 'assets/modernizr/dist/modernizr-custom.js|static';
    }
    $GLOBALS['TL_JAVASCRIPT']['bootstrap-hover-dropdown'] = 'bundles/heimrichhannotbootstraphoverdropdown/js/contao-bootstrap-hover-dropdown-bundle.min.js|static';
}