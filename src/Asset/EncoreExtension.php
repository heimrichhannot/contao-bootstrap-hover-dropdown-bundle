<?php

namespace HeimrichHannot\BootstrapHoverDropdownBundle\Asset;

use HeimrichHannot\BootstrapHoverDropdownBundle\HeimrichHannotBootstrapHoverDropdownBundle;
use HeimrichHannot\EncoreContracts\EncoreEntry;
use HeimrichHannot\EncoreContracts\EncoreExtensionInterface;

class EncoreExtension implements EncoreExtensionInterface
{

    public function getBundle(): string
    {
        return HeimrichHannotBootstrapHoverDropdownBundle::class;
    }

    public function getEntries(): array
    {
        return [
            EncoreEntry::create('contao-bootstrap-hover-dropdown-bundle', 'src/Resources/public/js/contao-bootstrap-hover-dropdown-bundle.es6.js')
                ->addJsEntryToRemoveFromGlobals('bootstrap-hover-dropdown')
        ];
    }
}