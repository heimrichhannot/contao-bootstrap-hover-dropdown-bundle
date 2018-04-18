<?php

if(\Contao\System::getContainer()->get('huh.utils.container')->isFrontend())
{
    $GLOBALS['TL_JAVASCRIPT']['bootstrap-hover-dropdown'] = 'bundles/heimrichhannotbootstraphoverdropdown/js/contao-bootstrap-hover-dropdown-bundle.min.js|static';
}
