<?php

namespace App\DTO;

class OrderDTO
{
    public string $id;
    public string $productId;
    public int $quantity;
    public float $totalPrice;
    public \DateTimeImmutable $createdAt;

    public function __construct(string $id, string $productId, int $quantity, float $totalPrice)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->totalPrice = $totalPrice;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function toArray(): array
    {
        return [
            'orderId' => $this->id,
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'totalPrice' => $this->totalPrice,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
        ];
    }
}
