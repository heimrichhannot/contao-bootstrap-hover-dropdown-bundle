<?php

/**
 * This file is part of the "bootstrap-hover-dropdown-bundle" Extension for Contao Open Source CMS.
 *
 * @copyright Heimrich & Hannot GmbH, 2024
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\BootstrapHoverDropdownBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Config\ConfigPluginInterface;
use HeimrichHannot\BootstrapHoverDropdownBundle\HeimrichHannotBootstrapHoverDropdownBundle;
use Symfony\Component\Config\Loader\LoaderInterface;

class Plugin implements BundlePluginInterface, ConfigPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(HeimrichHannotBootstrapHoverDropdownBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                    'bootstrapper',
                ]),
        ];
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig): void
    {
        $loader->load('@HeimrichHannotBootstrapHoverDropdownBundle/Resources/config/services.yaml');
    }
}