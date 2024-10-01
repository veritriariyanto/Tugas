<?php
require 'Product.php';
require 'Category.php';
require 'User.php';
require 'Order.php';

// Creating products
$product1 = new Product("Laptop", 1500, "Laptop canggih.");
$product2 = new Product("Smartphone", 800, "Hp keluaran tahun 2025.");

// Creating a category and adding products
$category = new Category("Electronics");
$category->addProduct($product1);
$category->addProduct($product2);

// Creating a user
$user = new User("supri racing", "supri@gmail.com");

// Creating an order and adding products
$order = new Order($user);
$order->addProduct($product1);
$order->addProduct($product2);

// Displaying information
$category->displayCategory();
$order->displayOrder();
?>