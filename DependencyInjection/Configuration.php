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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Mauro Foti <m.foti@teckhouse.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('teck_house_m_detect');

        $rootNode
            ->children()
                ->booleanNode('inject_in_request')->defaultFalse()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
