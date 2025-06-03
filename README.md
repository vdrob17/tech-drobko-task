# Order Management System

This project demonstrates a simple microservices-based **Order Management System** composed of two services:

- **Product Service** — built with Node.js and Express.js  
- **Order Service** — built with PHP (Symfony MicroKernel)

The services communicate via REST API to simulate basic product ordering logic.

---

## Project Structure

```
.
├── node-product-service/   # Node.js service for product listing
└── php-order-service/      # PHP service for order creation & listing
```

---

## How to Run

### Product Service (Node.js)

#### Setup

```bash
cd node-product-service
npm install
```

#### Run

```bash
npm start
# or for dev:
npm run dev
```

#### Endpoints

| Method | Endpoint              | Description               |
|--------|-----------------------|---------------------------|
| GET    | `/products`           | Get all products          |
| GET    | `/products/:id`       | Get product by ID         |

---

### Order Service (PHP / Symfony MicroKernel)

#### Setup

```bash
cd php-order-service
composer install
```

#### Run (Built-in PHP Server)

```bash
symfony serve
# or manually
php -S localhost:8000 -t public
```

#### Endpoints

| Method | Endpoint      | Description                    |
|--------|---------------|--------------------------------|
| POST   | `/orders`     | Create a new order             |
| GET    | `/orders`     | List all created orders        |

---

## Inter-Service Communication

- The **Order Service** uses Guzzle to query the **Product Service** on:
  ```
  GET http://localhost:3000/products/:id
  ```

---

## Example cURL Requests

### Create an Order

```bash
curl -X POST http://localhost:8000/orders \
  -H "Content-Type: application/json" \
  -d '{"productId": "<some-uuid>", "quantity": 2}'
```

### Get All Orders

```bash
curl http://localhost:8000/orders
```

### Get All Products

```bash
curl http://localhost:3000/products
```