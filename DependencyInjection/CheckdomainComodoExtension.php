<?php

namespace Checkdomain\ComodoBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

use Braincrafted\Bundle\BootstrapBundle\DependencyInjection\AsseticConfiguration;

/**
 * Class CheckdomainComodoExtension
 */
class CheckdomainComodoExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter("checkdomain_comodo.account.user", $config['account']['user']);
        $container->setParameter("checkdomain_comodo.account.password", $config['account']['password']);

        $container->setParameter("checkdomain_comodo.imap.access", $config['imap']['access']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

}
