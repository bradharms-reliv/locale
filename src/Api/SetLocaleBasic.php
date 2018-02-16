<?php

namespace Reliv\Locale\Api;

use Reliv\Locale\Exception\LocaleException;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class SetLocaleBasic implements SetLocale
{
    /**
     * @var string
     */
    protected $defaultLocale;

    /**
     * @param string $defaultLocale
     */
    public function __construct(
        string $defaultLocale = null
    ) {
        if ($defaultLocale === null) {
            $defaultLocale = DefaultLocal::get();
        }
        $this->defaultLocale = $defaultLocale;
    }

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
    ): string {
        if (empty($locale)) {
            $locale = $this->defaultLocale;
        }

        if (empty($locale)) {
            // @todo warning or error
            return \Locale::getDefault();
        }

        if (!function_exists('setlocale')) {
            throw new LocaleException(
                'Function (setlocale) is required, please make sure the intl extension is installed'
            );
        }

        /* Conversion for Ubuntu and Mac local settings. */
        if (!setlocale(LC_MONETARY, $locale . '.utf8')) {
            if (!setlocale(LC_MONETARY, $locale . '.UTF-8')) {
                setlocale(LC_MONETARY, 'en_US.UTF-8');
            }
        }

        /* Conversion for Ubuntu and Mac local settings. */
        if (!setlocale(LC_NUMERIC, $locale . '.utf8')) {
            if (!setlocale(LC_NUMERIC, $locale . '.UTF-8')) {
                setlocale(LC_NUMERIC, 'en_US.UTF-8');
            }
        }

        /* Conversion for Ubuntu and Mac local settings. */
        if (!setlocale(LC_TIME, $locale . '.utf8')) {
            if (!setlocale(LC_TIME, $locale . '.UTF-8')) {
                setlocale(LC_TIME, 'en_US.UTF-8');
            }
        }

        \Locale::setDefault($locale);

        return $locale;
    }
}
