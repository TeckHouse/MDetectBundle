<?php

/*
 * This file is part of the TeckHouseMDetectBundle package.
 *
 * (c) TeckHouse <http://www.teckouse.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TeckHouse\MDetectBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Mauro Foti <m.foti@teckhouse.com>
 */
class TeckHouseMDetectExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        if ($config['inject_in_request']) {
            $container
                ->register('teckhouse_mdetect.request_listener', 'TeckHouse\MDetectBundle\EventListener\RequestListener')
                ->addTag('kernel.event_listener', array('event' => 'kernel.request', 'method' => 'setDeviceType'))
                ->addArgument(new Reference('teckhouse_mdetect.wrapper'))
            ;
        }
        
    }
}
