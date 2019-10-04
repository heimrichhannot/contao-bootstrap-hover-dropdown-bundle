<?php

/*
 * Copyright (c) 2019 Heimrich & Hannot GmbH
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\BootstrapHoverDropdownBundle\Tests;

use HeimrichHannot\BootstrapHoverDropdownBundle\HeimrichHannotBootstrapHoverDropdownBundle;
use PHPUnit\Framework\TestCase;

class HeimrichHannotBootstrapHoverDropdownBundleTest extends TestCase
{
    /**
     * Tests the object instantiation.
     */
    public function testCanBeInstantiated()
    {
        $bundle = new HeimrichHannotBootstrapHoverDropdownBundle();

        $this->assertInstanceOf('HeimrichHannot\BootstrapHoverDropdownBundle\HeimrichHannotBootstrapHoverDropdownBundle', $bundle);
    }

    /**
     * Tests the getContainerExtension() method.
     */
    public function testReturnsTheContainerExtension()
    {
        $bundle = new HeimrichHannotBootstrapHoverDropdownBundle();

        $this->assertInstanceOf(
            'HeimrichHannot\BootstrapHoverDropdownBundle\DependencyInjection\HeimrichHannotBootstrapHoverDropdownExtension',
            $bundle->getContainerExtension()
        );
    }
}
