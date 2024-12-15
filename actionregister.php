<?php
// Menyertakan file koneksi
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir
    $name = $_POST["name"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $ibadah = $_POST["ibadah"];
    $nomorhp = $_POST["nomorhp"];
    $bidang = $_POST["bidang"];
    $keterangan = "Menunggu validasi koordinator"; // Default keterangan
    $password = $_POST["tanggal_lahir"];
    $level = "Non Aktif";

    // Menyiapkan pernyataan SQL untuk memasukkan data ke dalam tabel
    $sql = "INSERT INTO user (name, password, tanggal_lahir, ibadah, nomorhp, bidang, level, keterangan) 
            VALUES ('$name', '$password', '$tanggal_lahir', '$ibadah', '$nomorhp', '$bidang', '$level', '$keterangan')";

    // Menampilkan query SQL (untuk debugging)
    echo "Query: $sql";

    // Menjalankan pernyataan SQL
    $result = mysqli_query($koneksi, $sql);

    // Handling Errors
    if ($result) {
        $message = "Register berhasil. Silakan tunggu validasi koordinator.";
        echo "<script>
                alert('$message');
                window.location.href='index.php';
              </script>";
    } else {
        $error_message = "Register gagal. Silahkan coba kembali. Error: " . mysqli_error($koneksi);
        echo "<script>
                alert('$error_message');
                window.location.href='register.php';
              </script>";
    }

    // Menutup koneksi
    mysqli_close($koneksi);
}
?>
