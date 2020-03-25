<?php

$GLOBALS['TL_HOOKS']['generatePage'][]	= [\HeimrichHannot\BootstrapHoverDropdownBundle\EventListener\GeneratePageListener::class, 'onGeneratePage'];