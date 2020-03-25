<?php

/*
 * Copyright (c) 2020 Heimrich & Hannot GmbH
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\BootstrapHoverDropdownBundle\EventListener;

use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;

class GeneratePageListener
{
    /**
     * @Hook("generatePage")
     */
    public function onGeneratePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
        if (!isset($GLOBALS['TL_JAVASCRIPT']['modernizr'])) {
            $GLOBALS['TL_JAVASCRIPT']['modernizr'] = 'assets/modernizr/dist/modernizr-custom.js|static';
        }
        $GLOBALS['TL_JAVASCRIPT']['bootstrap-hover-dropdown'] = 'bundles/heimrichhannotbootstraphoverdropdown/js/contao-bootstrap-hover-dropdown-bundle.min.js|static';
    }
}
