<?php

namespace App\HttpClient;

use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://localhost:3000']);
    }

    public function getProduct(string $id): array
    {
        try {
            $response = $this->client->get("/products/{$id}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Product not found.");
        }
    }
}
