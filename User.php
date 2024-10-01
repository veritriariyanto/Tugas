<?php
class User {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function displayUserInfo() {
        echo "User: " . $this->name . "<br>";
        echo "Email: " . $this->email . "<br>";
    }
}
?>

