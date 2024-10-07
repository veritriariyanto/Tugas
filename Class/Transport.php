<?php
class Transport {
    public $id;
    public $nama_transport;
    public $tipe_transport;
    public $biaya;
    public $destination_id;
    public $created_at;
    public $updated_at;

    // Konstruktor untuk inisialisasi objek Transport
    public function __construct($nama_transport, $tipe_transport, $biaya, $destination_id) {
        $this->nama_transport = $nama_transport;
        $this->tipe_transport = $tipe_transport;
        $this->biaya = $biaya;
        $this->destination_id = $destination_id;
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    // Metode untuk menyimpan data ke database
    public function save($pdo) {
        $sql = "INSERT INTO Transports (nama_transport, tipe_transport, biaya, destination_id, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->nama_transport, $this->tipe_transport, $this->biaya, $this->destination_id, $this->created_at, $this->updated_at]);
    }

    // Metode untuk mengambil semua data transport
    public static function getAll($pdo) {
        $sql = "SELECT Transports.*, Destinations.nama_destinasi FROM Transports
                LEFT JOIN Destinations ON Transports.destination_id = Destinations.id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>