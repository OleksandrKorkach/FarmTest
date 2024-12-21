1. Clone repository from GitHub
2. Make sure you have PostgreSQL, PHP, Composer installed
3. Run: composer install
4. Copy env: cp .env.example .env and set them due to your db configs
5. Make sure to run: php artisan key:generate
6. Create your database if you haven't done it already
7. Run migrations: php artisan migrate
8. Run built-in server to test application: php artisan serve

Application supports 5 routes such as:

1. GET /api/products to retrieve all products based on filters, for example:

    GET /api/products?name=product&min_quantity=2&max_price=13

2. POST /api/products
    
    body 
    {
        "name": "product 1",
        "description": "Product Description 1",
        "quantity": 2,
        "price": 10.3
    }

3. PUT /api/products/{id}
    
    body
    {
        "name": "product 1",
        "description": "Product Description 1",
        "quantity": 2,
        "price": 10.3
    }

4. DELETE /api/products/{id}

5. GET /api/products/1

Body and params are validated

I tested using postman (don't forget to include header Accept application/json to your requests)
