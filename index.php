<?php
require_once 'config.php';
require_once './Class/Destination.php';
require_once './Class/Hotel.php';
require_once './Class/Transport.php';
require_once './Class/Paket.php';
require_once './Class/User.php';

// Proses form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_destination'])) {
        // Proses input Destination
        $nama_destinasi = $_POST['nama_destinasi'];
        $deskripsi = $_POST['deskripsi'];
        $lokasi = $_POST['lokasi'];
        $htm = $_POST['htm'];
        $image = $_POST['image'];

        $destination = new Destination($nama_destinasi, $deskripsi, $lokasi, $htm, $image);
        $destination->save($pdo);
        echo "<p>Data destinasi berhasil ditambahkan!</p>";
    } elseif (isset($_POST['submit_hotel'])) {
        // Proses input Hotel
        $nama_hotel = $_POST['nama_hotel'];
        $alamat = $_POST['alamat'];
        $harga_per_malam = $_POST['harga_per_malam'];
        $destination_id = $_POST['destination_id'];

        $hotel = new Hotel($nama_hotel, $alamat, $harga_per_malam, $destination_id);
        $hotel->save($pdo);
        echo "<p>Data hotel berhasil ditambahkan!</p>";
    } elseif (isset($_POST['submit_transport'])) {
        // Proses input Transport
        $nama_transport = $_POST['nama_transport'];
        $tipe_transport = $_POST['tipe_transport'];
        $biaya = $_POST['biaya'];
        $destination_id = $_POST['destination_id'];

        $transport = new Transport($nama_transport, $tipe_transport, $biaya, $destination_id);
        $transport->save($pdo);
        echo "<p>Data transportasi berhasil ditambahkan!</p>";
    } elseif (isset($_POST['submit_paket'])) {
        // Proses input Paket
        $nama_paket = $_POST['nama_paket'];
        $deskripsi = $_POST['deskripsi'];
        $destination_id = $_POST['destination_id'];
        $hotel_id = $_POST['hotel_id'];
        $transport_id = $_POST['transport_id'];

        $paket = new Paket($nama_paket, $deskripsi, $destination_id, $hotel_id, $transport_id);
        $paket->save($pdo);
        echo "<p>Data paket berhasil ditambahkan!</p>";
            // Proses input Paket setelah User
    if (isset($_POST['nama_paket']) && isset($_POST['deskripsi']) && isset($_POST['destination_id']) && isset($_POST['hotel_id']) && isset($_POST['transport_id'])) {
        $nama_paket = $_POST['nama_paket'];
        $deskripsi = $_POST['deskripsi'];
        $destination_id = $_POST['destination_id'];
        $hotel_id = $_POST['hotel_id'];
        $transport_id = $_POST['transport_id'];

        $paket = new Paket($nama_paket, $deskripsi, $destination_id, $hotel_id, $transport_id);
        $paket->save($pdo);
        echo "<p>Data paket berhasil ditambahkan!</p>";
    } else {
        echo "<p>Gagal menambahkan data paket!</p>";
    }
    } elseif (isset($_POST['daftar'])) {
    // Proses input User
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $role = $_POST['role'];
    $agree = isset($_POST['agree']) ? 1 : 0;
    $comments = $_POST['comments'];

    // Menyimpan data user ke tabel users
    $user = new User($username, $password, $no_hp, $email, $gender, $role, $agree, $comments);
    $user->save($pdo);
    echo "<p>Data pengguna berhasil ditambahkan!</p>";
}
}


// Ambil semua data untuk ditampilkan
$destinations = Destination::getAll($pdo);
$hotels = Hotel::getAll($pdo);
$transports = Transport::getAll($pdo);
$pakets = Paket::getAll($pdo);
$users = User::getAll($pdo);

// Ambil daftar destinasi untuk dropdown
$destination_list = Destination::getAll($pdo);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Input Data Wisata</title>
</head>

<body>
    <h2>Form Daftar</h2>
    <h2>User Registration Form</h2>
    <form method="post" action="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <label for="no_hp">No HP:</label><br>
        <input type="text" id="no_hp" name="no_hp"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <label for="role">Role:</label><br>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="user">User </option>
        </select><br><br>

        <label for="agree">Agree:</label><br>
        <input type="checkbox" id="agree" name="agree"><br><br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments"></textarea><br><br>

        <input type="submit" name="daftar" value="Submit">
    </form>
    <h2>Data Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Agree</th>
            <th>Comments</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['no_hp']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['gender']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td><?php echo $user['agree'] ? 'Yes' : 'No'; ?></td>
            <td><?php echo $user['comments']; ?></td>
            <td><?php echo $user['created_at']; ?></td>
            <td><?php echo $user['updated_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Form Input Destinasi Wisata</h2>
    <form method="post" action="">
        <label for="nama_destinasi">Nama Destinasi:</label><br>
        <input type="text" id="nama_destinasi" name="nama_destinasi" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

        <label for="lokasi">Lokasi/Alamat:</label><br>
        <input type="text" id="lokasi" name="lokasi" required><br><br>

        <label for="htm">Harga Tiket Masuk (HTM):</label><br>
        <input type="number" id="htm" name="htm" required><br><br>

        <label for="image">URL Gambar:</label><br>
        <input type="text" id="image" name="image" required><br><br>

        <button type="submit" name="submit_destination">Simpan Destinasi</button>
    </form>

    <h2>Data Destinasi Wisata</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Destinasi</th>
            <th>Deskripsi</th>
            <th>Lokasi</th>
            <th>HTM</th>
            <th>Gambar</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <?php foreach ($destinations as $destination): ?>
        <tr>
            <td><?php echo $destination['id']; ?></td>
            <td><?php echo $destination['nama_destinasi']; ?></td>
            <td><?php echo $destination['deskripsi']; ?></td>
            <td><?php echo $destination['lokasi']; ?></td>
            <td><?php echo $destination['htm']; ?></td>
            <td><img src="<?php echo $destination['image']; ?>" alt="Image" width="100"></td>
            <td><?php echo $destination['created_at']; ?></td>
            <td><?php echo $destination['updated_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Form Input Hotel</h2>
    <form method="post" action="">
        <label for="nama_hotel">Nama Hotel:</label><br>
        <input type="text" id="nama_hotel" name="nama_hotel" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" required><br><br>

        <label for="harga_per_malam">Harga per Malam:</label><br>
        <input type="number" id="harga_per_malam" name="harga_per_malam" required><br><br>

        <label for="destination_id">Destinasi:</label><br>
        <select id="destination_id" name="destination_id" required>
            <?php foreach ($destination_list as $dest): ?>
            <option value="<?php echo $dest['id']; ?>"><?php echo $dest['nama_destinasi']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" name="submit_hotel">Simpan Hotel</button>
    </form>

    <h2>Data Hotel</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Hotel</th>
            <th>Alamat</th>
            <th>Harga per Malam</th>
            <th>Destinasi</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <?php foreach ($hotels as $hotel): ?>
        <tr>
            <td><?php echo $hotel['id']; ?></td>
            <td><?php echo $hotel['nama_hotel']; ?></td>
            <td><?php echo $hotel['alamat']; ?></td>
            <td><?php echo $hotel['harga_per_malam']; ?></td>
            <td><?php echo $hotel['nama_destinasi']; ?></td>
            <td><?php echo $hotel['created_at']; ?></td>
            <td><?php echo $hotel['updated_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Form Input Transportasi</h2>
    <form method="post" action="">
        <label for="nama_transport">Nama Transportasi:</label><br>
        <input type="text" id="nama_transport" name="nama_transport" required><br><br>

        <label for="tipe_transport">Tipe Transportasi:</label><br>
        <select id="tipe_transport" name="tipe_transport" required>
            <option value="bis">Bis</option>
            <option value="travel">Travel</option>
            <option value="pesawat">Pesawat</option>
            <option value="kapal">Kapal</option>
        </select><br><br>

        <label for="biaya">Biaya:</label><br>
        <input type="number" id="biaya" name="biaya" required><br><br>

        <label for="destination_id">Destinasi:</label><br>
        <select id="destination_id" name="destination_id" required>
            <?php foreach ($destination_list as $dest): ?>
            <option value="<?php echo $dest['id']; ?>"><?php echo $dest['nama_destinasi']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" name="submit_transport">Simpan Transportasi</button>
    </form>

    <h2>Data Transportasi</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Transportasi</th>
            <th>Tipe</th>
            <th>Biaya</th>
            <th>Destinasi</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <?php foreach ($transports as $transport): ?>
        <tr>
            <td><?php echo $transport['id']; ?></td>
            <td><?php echo $transport['nama_transport']; ?></td>
            <td><?php echo $transport['tipe_transport']; ?></td>
            <td><?php echo $transport['biaya']; ?></td>
            <td><?php echo $transport['nama_destinasi']; ?></td>
            <td><?php echo $transport['created_at']; ?></td>
            <td><?php echo $transport['updated_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Form Input Paket Wisata</h2>
    <form method="post" action="">
        <label for="nama_paket">Nama Paket:</label><br>
        <input type="text" id="nama_paket" name="nama_paket" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

        <label for="destination_id">Destinasi:</label><br>
        <select id="destination_id" name="destination_id" required>
            <?php foreach ($destination_list as $dest): ?>
            <option value="<?php echo $dest['id']; ?>"><?php echo $dest['nama_destinasi']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="hotel_id">Hotel:</label><br>
        <select id="hotel_id" name="hotel_id" required>
            <?php foreach ($hotels as $hotel): ?>
            <option value="<?php echo $hotel['id']; ?>"><?php echo $hotel['nama_hotel']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="transport_id">Transportasi:</label><br>
        <select id="transport_id" name="transport_id" required>
            <?php foreach ($transports as $transport): ?>
            <option value="<?php echo $transport['id']; ?>"><?php echo $transport['nama_transport']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" name="submit_paket">Simpan Paket Wisata</button>
    </form>

    <h2>Data Paket Wisata</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Paket</th>
            <th>Deskripsi</th>
            <th>Harga Total</th>
            <th>Destinasi</th>
            <th>Hotel</th>
            <th>Transportasi</th>
            <th>Rating</th>
            <th>Ulasan</th>
            <th>Total Pembelian</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <?php foreach ($pakets as $paket): ?>
        <tr>
            <td><?php echo $paket['id']; ?></td>
            <td><?php echo $paket['nama_paket']; ?></td>
            <td><?php echo $paket['deskripsi']; ?></td>
            <td><?php echo $paket['harga_total']; ?></td>
            <td><?php echo $paket['nama_destinasi']; ?></td>
            <td><?php echo $paket['nama_hotel']; ?></td>
            <td><?php echo $paket['nama_transport']; ?></td>
            <td><?php echo $paket['rating']; ?></td>
            <td><?php echo $paket['ulasan']; ?></td>
            <td><?php echo $paket['total_pembelian']; ?></td>
            <td><?php echo $paket['created_at']; ?></td>
            <td><?php echo $paket['updated_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>