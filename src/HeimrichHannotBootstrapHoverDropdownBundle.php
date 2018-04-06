<?php

/*
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\BootstrapHoverDropdownBundle;

use HeimrichHannot\BootstrapHoverDropdownBundle\DependencyInjection\HeimrichHannotBootstrapHoverDropdownExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotBootstrapHoverDropdownBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new HeimrichHannotBootstrapHoverDropdownExtension();
    }
}
