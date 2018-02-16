<?php

namespace Reliv\Locale;

use Reliv\Locale\Api\DefaultLocal;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigDefaultLocale
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'locale-default' => DefaultLocal::get()
        ];
    }
}
