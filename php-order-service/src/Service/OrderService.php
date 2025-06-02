<?php

namespace App\Service;

use App\DTO\OrderDTO;
use App\HttpClient\ProductClient;
use App\Storage\OrderStorage;
use Ramsey\Uuid\Uuid;

class OrderService
{
    private ProductClient $productClient;
    private OrderStorage $storage;

    public function __construct(ProductClient $productClient, OrderStorage $storage)
    {
        $this->productClient = $productClient;
        $this->storage = $storage;
    }

    public function createOrder(string $productId, int $quantity): array
    {
        $product = $this->productClient->getProduct($productId);
        $total = $product['price'] * $quantity;

        $order = new OrderDTO(Uuid::uuid4()->toString(), $productId, $quantity, $total);
        $this->storage->add($order);

        return $order->toArray();
    }

    public function getAllOrders(): array
    {
        return $this->storage->all();
    }
}
