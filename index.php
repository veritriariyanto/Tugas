<?php
require_once './Class/Destination.php';
require_once './Class/Hotel.php';
require_once './Class/Transport.php';
require_once './Class/Paket.php';

// Contoh penggunaan class
$destination = new Destination(1, "Pantai Kuta", "Pantai indah di Bali", "Bali", 50000, "image.jpg", "2024-01-01", "2024-01-02");
$hotel = new Hotel(1, "Hotel Bali Indah", "Jl. Sunset Road", 300000, 1, "2024-01-01", "2024-01-02");
$transport = new Transport(1, "Bus Bali", "bis", 100000, 1, "2024-01-01", "2024-01-02");

$paket = new Paket(
    $destination->id,
    $destination->nama_destinasi,
    $destination->deskripsi,
    $destination->lokasi,
    $destination->htm,
    $destination->image,
    $destination->created_at,
    $destination->updated_at,
    "Paket Liburan Bali",
    "Liburan lengkap ke Bali",
    0,
    $hotel->id,
    $transport->id
);

$harga_total = $paket->hitungHargaTotal($transport->biaya, $hotel->harga_per_malam);
echo "Nama Paket: " . $paket->nama_paket . "<br>";
echo "Harga Total: Rp" . $harga_total;
?>