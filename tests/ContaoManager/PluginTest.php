<?php

/*
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\BootstrapHoverDropdownBundle\Test\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\DelegatingParser;
use Contao\ManagerPlugin\Config\ContainerBuilder;
use Contao\ManagerPlugin\PluginLoader;
use Contao\TestCase\ContaoTestCase;
use HeimrichHannot\BootstrapHoverDropdownBundle\ContaoManager\Plugin;
use HeimrichHannot\BootstrapHoverDropdownBundle\HeimrichHannotBootstrapHoverDropdownBundle;

/**
 * Test the plugin class
 * Class PluginTest.
 */
class PluginTest extends ContaoTestCase
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

        $this->container = new ContainerBuilder($this->mockPluginLoader($this->never()), []);
    }

    /**
     * Tests the object instantiation.
     */
    public function testInstantiation()
    {
        static::assertInstanceOf(Plugin::class, new Plugin());
    }

    /**
     * Tests the bundle contao invocation.
     */
    public function testGetBundles()
    {
        $plugin = new Plugin();

        /** @var BundleConfig[] $bundles */
        $bundles = $plugin->getBundles(new DelegatingParser());

        static::assertCount(1, $bundles);
        static::assertInstanceOf(BundleConfig::class, $bundles[0]);
        static::assertSame(HeimrichHannotBootstrapHoverDropdownBundle::class, $bundles[0]->getName());
        static::assertSame([ContaoCoreBundle::class], $bundles[0]->getLoadAfter());
    }

    /**
     * Test extend configuration.
     */
    public function testGetExtensionConfigLoadFilterConfig()
    {
        $plugin = new Plugin();

        $extensionConfigs = $plugin->getExtensionConfig('huh_encore', [[]], $this->container);

        $this->assertNotEmpty($extensionConfigs);
        $this->assertArrayHasKey('huh', $extensionConfigs);
        $this->assertArrayHasKey('encore', $extensionConfigs['huh']);

        $this->assertArrayHasKey('entries', $extensionConfigs['huh']['encore']);
        $this->assertNotEmpty($extensionConfigs['huh']['encore']['entries']);

        $this->assertContains(['name' => 'contao-bootstrap-hover-dropdown-bundle', 'file' => 'vendor/heimrichhannot/contao-bootstrap-hover-dropdown-bundle/src/Resources/public/js/contao-bootstrap-hover-dropdown-bundle.es6.js'], $extensionConfigs['huh']['encore']['entries']);

        $this->assertArrayHasKey('legacy', $extensionConfigs['huh']['encore']);
        $this->assertNotEmpty($extensionConfigs['huh']['encore']['legacy']);

        $this->assertArrayHasKey('js', $extensionConfigs['huh']['encore']['legacy']);
        $this->assertNotEmpty($extensionConfigs['huh']['encore']['legacy']['js']);

        $this->assertContains('bootstrap-hover-dropdown', $extensionConfigs['huh']['encore']['legacy']['js']);
    }

    /**
     * Mocks the plugin loader.
     *
     * @param \PHPUnit_Framework_MockObject_Matcher_InvokedCount $expects
     * @param array                                              $plugins
     *
     * @return PluginLoader|\PHPUnit_Framework_MockObject_MockObject
     */
    private function mockPluginLoader(\PHPUnit_Framework_MockObject_Matcher_InvokedCount $expects, array $plugins = [])
    {
        $pluginLoader = $this->createMock(PluginLoader::class);

        $pluginLoader->expects($expects)->method('getInstancesOf')->with(PluginLoader::EXTENSION_PLUGINS)->willReturn($plugins);

        return $pluginLoader;
    }
}
