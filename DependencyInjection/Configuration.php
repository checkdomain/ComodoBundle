<?php

namespace Checkdomain\ComodoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('checkdomain_comodo');

        $rootNode->children()
                 ->arrayNode('account')
                     ->children()
                     ->scalarNode('user')->isRequired()->cannotBeEmpty()->end()
                     ->scalarNode('password')->isRequired()->cannotBeEmpty()->end()
                     ->end()
                 ->end();

        return $treeBuilder;
    }
}
