<?php

namespace Reliv\Locale;

use Reliv\Locale\Api\SetLocale;
use Reliv\Locale\Api\SetLocaleBasicFactory;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfig
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'config_factories' => [
                    SetLocale::class => [
                        'factory' => SetLocaleBasicFactory::class,
                    ],
                ],
            ],
        ];
    }
}
