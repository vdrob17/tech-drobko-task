<?php

namespace App;

use App\Controller\OrderController;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->add('order_create', '/orders')
            ->controller([OrderController::class, 'createOrder'])
            ->methods(['POST']);

        $routes->add('order_list', '/orders')
            ->controller([OrderController::class, 'getOrders'])
            ->methods(['GET']);
    }
}
