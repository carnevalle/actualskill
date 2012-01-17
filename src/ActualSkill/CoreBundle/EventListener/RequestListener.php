<?php

namespace ActualSkill\CoreBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RequestListener
{
    /**
     * Container
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Listener constructor
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * kernel.request Event
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request  = $event->getRequest();
        
        //$user = $this->container->get('security.context')->getToken()->getUser();
        
        // Here you can intercept all HTTP requests, and through $container get access to user information
        //$this->container->get('logger')->info('This will be written in logs: '.$user);
    }
}