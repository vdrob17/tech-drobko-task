<?php

namespace App\Storage;

use App\DTO\OrderDTO;

class OrderStorage
{
    private array $orders = [];

    public function add(OrderDTO $order): void
    {
        $this->orders[] = $order;
    }

    public function all(): array
    {
        return array_map(fn(OrderDTO $o) => $o->toArray(), $this->orders);
    }
}
