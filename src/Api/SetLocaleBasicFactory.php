<?php

namespace Reliv\Locale\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class SetLocaleBasicFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return SetLocaleBasic
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        $config = $serviceContainer->get('config');

        return new SetLocaleBasic(
            $config['locale-default']
        );
    }
}
