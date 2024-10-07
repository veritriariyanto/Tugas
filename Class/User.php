<?php 
class User {
    public $id;
    public $username;
    public $password;
    public $no_hp;
    public $email;
    public $gender;
    public $role;
    public $agree;
    public $comments;
    public $created_at;
    public $updated_at;

    // Konstruktor untuk inisialisasi objek User
    public function __construct($username, $password, $no_hp, $email, $gender, $role, $agree, $comments) {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash password
        $this->no_hp = $no_hp;
        $this->email = $email;
        $this->gender = $gender;
        $this->role = $role;
        $this->agree = $agree;
        $this->comments = $comments;
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    // Metode untuk menyimpan data ke database
    public function save(PDO $pdo): void {
        $sql = "INSERT INTO users (username, password, no_hp, email, gender, role, agree, comments, created_at, updated_at)
                VALUES (:username, :password, :no_hp, :email, :gender, :role, :agree, :comments, :created_at, :updated_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':no_hp', $this->no_hp);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':agree', $this->agree);
        $stmt->bindParam(':comments', $this->comments);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->execute();
    }

    // Metode untuk mengambil semua data user
    public static function getAll(PDO $pdo): array {
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>