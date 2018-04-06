<?php

/*
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\BootstrapHoverDropdownBundle\Tests\DependencyInjection;

use HeimrichHannot\BootstrapHoverDropdownBundle\DependencyInjection\HeimrichHannotBootstrapHoverDropdownExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class HeimrichHannotContaoFilterExtensionTest extends TestCase
{
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->container = new ContainerBuilder(new ParameterBag(['kernel.debug' => false]));
        $extension = new HeimrichHannotBootstrapHoverDropdownExtension();
        $extension->load([], $this->container);
    }

    /**
     * Tests the object instantiation.
     */
    public function testCanBeInstantiated()
    {
        $extension = new HeimrichHannotBootstrapHoverDropdownExtension();
        $this->assertInstanceOf('HeimrichHannot\BootstrapHoverDropdownBundle\DependencyInjection\HeimrichHannotBootstrapHoverDropdownExtension', $extension);
    }
}
