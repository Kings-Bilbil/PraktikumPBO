<?php
// --- BAGIAN LOGIKA PHP ---

/**
 * Class User adalah cetak biru untuk objek pengguna.
 * Ia memiliki properti untuk username dan password, serta metode untuk login.
 */
class User {
    // Properti untuk menyimpan username dan password yang benar.
    public $username;
    public $password; // <-- Perbaikan: Menambahkan '$' yang hilang.

    /**
     * Metode untuk mengecek apakah input login sesuai dengan data yang tersimpan.
     * @param string $inputUsername Username yang dimasukkan oleh pengguna.
     * @param string $inputPassword Password yang dimasukkan oleh pengguna.
     * @return string Pesan yang menandakan berhasil atau gagalnya login.
     */
    public function login($inputUsername, $inputPassword) {
        // Membandingkan input dengan properti yang dimiliki objek ini.
        if ($inputUsername === $this->username && $inputPassword === $this->password) {
            // Jika keduanya cocok, kembalikan pesan berhasil.
            return "Selamat datang, {$this->username}! Login berhasil.";
            
        } else {
            // Jika salah satu atau keduanya tidak cocok, kembalikan pesan gagal.
            return "Login gagal. Username atau password salah.";
        }
    }
}

// --- PROSES PENANGANAN FORM ---

// Siapkan variabel untuk menyimpan pesan hasil login, awalnya kosong.
$loginMessage = '';

// Cek apakah halaman ini dibuka karena pengguna mengirimkan form (metode POST).
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari form. '?? '' ' berarti jika data tidak ada, gunakan string kosong.
    $inputUsername = $_POST['username'] ?? '';
    $inputPassword = $_POST['password'] ?? '';

    // 1. Buat objek pengguna baru.
    $user = new User();

    // 2. Atur data dummy (data yang benar) untuk objek pengguna.
    $user->username = 'admin';
    $user->password = '12345';
    
    // 3. Panggil metode login dengan data dari form, lalu simpan pesannya.
    $loginMessage = $user->login($inputUsername, $inputPassword);
}

// --- BAGIAN TAMPILAN HTML ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <!-- CSS diperbarui untuk menangani form input -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="form-container">
        <h1 class="keterangan">Form Login</h1>
        
        <!-- Form Login -->
        <!-- 'action=""' berarti form akan dikirim ke halaman ini sendiri. -->
        <!-- 'method="POST"' berarti data dikirim secara tersembunyi. -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="admin" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"  placeholder="12345" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <?php
        // PHP akan mengecek jika ada pesan login untuk ditampilkan.
        // Blok ini hanya akan muncul setelah pengguna mencoba login.
        if (!empty($loginMessage)) {
            echo "<p class='login-result'>{$loginMessage}</p>";
        }
        ?>
    </div>
</body>
</html>

