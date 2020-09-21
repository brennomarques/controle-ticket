<?php

namespace Core\Factories;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Transport\Smtp as SmtpTransport;

class TransportSmtpFactory implements FactoryInterface{
    /**
     * {@inheritdoo}
     */
    
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $config = $container->get('config');
        $transport = new SmtpTransport();
        $options = new SmtpOptions($config['mail']);
        $transport->setOptions($options);

        return $transport;
    }
}