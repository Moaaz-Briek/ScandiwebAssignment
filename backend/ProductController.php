<?php

class ProductController
{
    public static function viewProductList(): void
    {
        include 'frontend/pages/ProductList.php';
    }

    public static function viewProductPage(): void
    {
        include "frontend/pages/AddProduct.php";
    }

    public static function getProducts()
    {
        return response((new ProductModel)->getAllProducts());
    }

    public static function addProduct(array $inputs)
    {
        new ProductValidatorController($inputs);
    }

    public static function deleteProduct($inputs): void
    {
        (new ProductModel())->deleteProduct($inputs);
    }
};