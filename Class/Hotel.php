<?php
class Hotel {
    public $id;
    public $nama_hotel;
    public $alamat;
    public $harga_per_malam;
    public $destination_id;
    public $created_at;
    public $updated_at;

    // Konstruktor untuk inisialisasi objek Hotel
    public function __construct($nama_hotel, $alamat, $harga_per_malam, $destination_id) {
        $this->nama_hotel = $nama_hotel;
        $this->alamat = $alamat;
        $this->harga_per_malam = $harga_per_malam;
        $this->destination_id = $destination_id;
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    // Metode untuk menyimpan data ke database
    public function save($pdo) {
        $sql = "INSERT INTO Hotels (nama_hotel, alamat, harga_per_malam, destination_id, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->nama_hotel, $this->alamat, $this->harga_per_malam, $this->destination_id, $this->created_at, $this->updated_at]);
    }

    // Metode untuk mengambil semua data hotel
    public static function getAll($pdo) {
        $sql = "SELECT Hotels.*, Destinations.nama_destinasi FROM Hotels
                LEFT JOIN Destinations ON Hotels.destination_id = Destinations.id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>