<?php
require_once 'Product.php';
require_once 'Category.php';
require_once 'User.php';
require_once 'Order.php';

// Creating products
$product1 = new Product("Laptop", 1500, "A high-performance laptop.");
$product2 = new Product("Smartphone", 800, "A new generation smartphone.");

// Creating a category and adding products
$category = new Category("Electronics");
$category->addProduct($product1);
$category->addProduct($product2);

// Creating a user
$user = new User("John Doe", "john@example.com");

// Creating an order and adding products
$order = new Order($user);
$order->addProduct($product1);
$order->addProduct($product2);

// Displaying information
$category->displayCategory();
$order->displayOrder();
?>