<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Service\OrderService;

class OrderController
{
    private OrderService $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function createOrder(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['productId']) || !isset($data['quantity'])) {
            throw new BadRequestHttpException('Missing "productId" or "quantity"');
        }

        if (!is_string($data['productId']) || !is_numeric($data['quantity'])) {
            throw new BadRequestHttpException('"productId" must be a string and "quantity" must be a number');
        }

        if ($data['quantity'] < 1) {
            throw new BadRequestHttpException('"quantity" must be at least 1');
        }

        $order = $this->service->createOrder($data['productId'], (int) $data['quantity']);
        return new JsonResponse($order);
    }

    public function getOrders(): JsonResponse
    {
        return new JsonResponse($this->service->getAllOrders());
    }
}
