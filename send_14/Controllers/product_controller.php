<?php

require_once __DIR__ . '/../models/ProductModel.php';

$productModel = new ProductModel();

// Get only Electronics products
$products = $productModel->getProductsByCategory('Electronics');

// Send products to View
require_once __DIR__ . '/../views/product_View.php';