<?php
class Destination {
    public $id;
    public $nama_destinasi;
    public $deskripsi;
    public $lokasi;
    public $htm;
    public $image;
    public $created_at;
    public $updated_at;

    // Konstruktor untuk inisialisasi objek Destination
    public function __construct($nama_destinasi, $deskripsi, $lokasi, $htm, $image) {
        $this->nama_destinasi = $nama_destinasi;
        $this->deskripsi = $deskripsi;
        $this->lokasi = $lokasi;
        $this->htm = $htm;
        $this->image = $image;
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    // Metode untuk menyimpan data ke database
    public function save($pdo) {
        $sql = "INSERT INTO Destinations (nama_destinasi, deskripsi, lokasi, htm, image, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->nama_destinasi, $this->deskripsi, $this->lokasi, $this->htm, $this->image, $this->created_at, $this->updated_at]);
    }

    // Metode untuk mengambil semua data destinasi
    public static function getAll($pdo) {
        $sql = "SELECT * FROM Destinations";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>