<?php

namespace App\Controllers;

class ProductController
{
    public $products = [
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

    public function __construct() {}

    public function getListProducts()
    {
        return $this->products;
    }

    public function getProductById(int $productId)
    {
        echo '<pre>';
        print_r($productId);
        echo '</pre>';
    }

    public function index(): string
    {
        $products = [
            "product-1" => [
                "id" => 1
            ],
            "product-2" => [
                "id" => 1
            ]
        ];
        echo '<pre>';
        print_r($products);
        echo '</pre>';
        return "Product Index Function";
    }
}
