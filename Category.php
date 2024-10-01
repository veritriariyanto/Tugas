<?php
class Category {
    public $categoryName;
    public $products = [];

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function displayCategory() {
        echo "Category: " . $this->categoryName . "<br>";
        foreach ($this->products as $product) {
            $product->displayProduct();
            echo "<hr>";
        }
    }
}
?>
