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
                     ->addDefaultsIfNotSet()
                     ->children()
                     ->scalarNode('user')->defaultNull()->end()
                     ->scalarNode('password')->defaultNull()->end()
                     ->end()
                 ->end()
                 ->arrayNode('imap')
                    ->children()
                    ->arrayNode('access')
                        ->children()
                        ->scalarNode('host')->end()
                        ->scalarNode('ssl')->end()
                        ->scalarNode('user')->end()
                        ->scalarNode('password')->end()
                        ->end()
                    ->end()
                 ->end();

        return $treeBuilder;
    }
}
