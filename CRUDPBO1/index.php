<?php
// 1. Setup Database dan Objek
require_once "config/Database.php";
require_once "classes/Mahasiswa.php";

$database = new Database();
$db = $database->getConnection();
$mhs = new Mahasiswa($db);

// 2. Ambil semua data mahasiswa
$data = $mhs->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

    <h2>Data Mahasiswa</h2>
    <a href="tambah.php">+ Tambah Data</a><br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        // 3. Looping data dan menampilkannya di tabel
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['nim']); ?></td>
                <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </table>

</body>
</html>