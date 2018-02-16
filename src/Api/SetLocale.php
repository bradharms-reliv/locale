<?php

namespace Reliv\Locale\Api;

use Reliv\Locale\Exception\LocaleException;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface SetLocale
{
    /**
     * @param string $locale
     * @param array  $options
     *
     * @return string
     * @throws LocaleException
     */
    public function __invoke(
        $locale,
        array $options = []
    ): string;
}
