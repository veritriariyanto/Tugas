<?php
class Order {
    public $user;
    public $products = [];

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function displayOrder() {
        $this->user->displayUserInfo();
        echo "Ordered Products:<br>";
        foreach ($this->products as $product) {
            $product->displayProduct();
        }
    }
}
?>