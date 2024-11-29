<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Controllers\ProductController; // Đảm bảo import đúng lớp

class ProductControllerTest extends TestCase
{
    public function testProductList(): void
    {
        $controller = new ProductController();
        $products = $controller->getListProducts();
        $expected = [
            "product-1" => [
                "id" => 1,
                "name" => "Product One",
                "price" => 10.99
            ],
            "product-2" => [
                "id" => 2,
                "name" => "Product Two",
                "price" => 9.99
            ],
            "product-3" => [
                "id" => 3,
                "name" => "Product Three",
                "price" => 12.99
            ]
        ];
        $this->assertEquals($expected, $products);
    }
}
