<?php

namespace Silentkernel\ImageOptimizerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('silentkernel_image_optimizer', 'array');

        $rootNode
            ->children()
                ->arrayNode('profils')->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->arrayNode('jpegoptim')
                                ->defaultValue(['--strip-all', '--all-progressive',])
                                ->prototype('scalar')
                                ->end()
                            ->end()

                            ->arrayNode('pngquant')
                                ->defaultValue(['--force',])
                                ->prototype('scalar')
                                ->end()
                            ->end()

                            ->arrayNode('optipng')
                                ->defaultValue(['-i0', '-o2', '-quiet',])
                                ->prototype('scalar')
                                ->end()
                            ->end()

                            ->arrayNode('svgo')->prototype('scalar')->end()
                                ->defaultValue(['--disable=cleanupIDs'])
                                ->prototype('scalar')
                                ->end()
                            ->end()

                            ->arrayNode('gifsicle')->prototype('scalar')->end()
                                ->defaultValue([ '-b', '-O3',])
                                ->prototype('scalar')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;


        return $treeBuilder;
    }
}
