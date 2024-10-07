<?php
class Paket {
    public $id;
    public $nama_paket;
    public $deskripsi;
    public $harga_total;
    public $destination_id;
    public $hotel_id;
    public $transport_id;
    public $rating;
    public $ulasan;
    public $total_pembelian;
    public $created_at;
    public $updated_at;

    // Konstruktor untuk inisialisasi objek Paket
    public function __construct($nama_paket, $deskripsi, $destination_id, $hotel_id, $transport_id, $rating = 0, $ulasan = 0, $total_pembelian = 0) {
        $this->nama_paket = $nama_paket;
        $this->deskripsi = $deskripsi;
        $this->destination_id = $destination_id;
        $this->hotel_id = $hotel_id;
        $this->transport_id = $transport_id;
        $this->rating = $rating;
        $this->ulasan = $ulasan;
        $this->total_pembelian = $total_pembelian;
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    // Metode untuk menghitung harga total
    public function hitungHargaTotal($pdo) {
        // Ambil htm dari Destinations
        $stmt = $pdo->prepare("SELECT htm FROM Destinations WHERE id = ?");
        $stmt->execute([$this->destination_id]);
        $htm = $stmt->fetchColumn();

        // Ambil harga_per_malam dari Hotels
        $stmt = $pdo->prepare("SELECT harga_per_malam FROM Hotels WHERE id = ?");
        $stmt->execute([$this->hotel_id]);
        $harga_hotel = $stmt->fetchColumn();

        // Ambil biaya dari Transports
        $stmt = $pdo->prepare("SELECT biaya FROM Transports WHERE id = ?");
        $stmt->execute([$this->transport_id]);
        $biaya_transport = $stmt->fetchColumn();

        $this->harga_total = $htm + $harga_hotel + $biaya_transport;
    }

    // Metode untuk menyimpan data ke database
    public function save($pdo) {
        $this->hitungHargaTotal($pdo);
        $sql = "INSERT INTO Paket (nama_paket, deskripsi, harga_total, destination_id, hotel_id, transport_id, rating, ulasan, total_pembelian, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->nama_paket,
            $this->deskripsi,
            $this->harga_total,
            $this->destination_id,
            $this->hotel_id,
            $this->transport_id,
            $this->rating,
            $this->ulasan,
            $this->total_pembelian,
            $this->created_at,
            $this->updated_at
        ]);
    }

    // Metode untuk mengambil semua data paket
    public static function getAll($pdo) {
        $sql = "SELECT Paket.*, Destinations.nama_destinasi, Hotels.nama_hotel, Transports.nama_transport
                FROM Paket
                LEFT JOIN Destinations ON Paket.destination_id = Destinations.id
                LEFT JOIN Hotels ON Paket.hotel_id = Hotels.id
                LEFT JOIN Transports ON Paket.transport_id = Transports.id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>