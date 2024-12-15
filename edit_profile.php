<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_user']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Sertakan koneksi database
include('koneksi.php');

// Ambil ID User dari sesi
$id_user = $_SESSION['id_user'];

// Inisialisasi variabel pesan
$message = "";

// Proses form ketika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // Validasi input
    if (empty($password_baru) || empty($konfirmasi_password)) {
        $message = "Password dan konfirmasi password tidak boleh kosong!";
    } elseif ($password_baru !== $konfirmasi_password) {
        $message = "Password baru dan konfirmasi password tidak cocok!";
    } else {
        // Hash password baru
        $password_hashed = password_hash($password_baru, PASSWORD_DEFAULT);

        // Update password di database
        $sql = "UPDATE user SET password = ? WHERE id_user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $password_hashed, $id_user);

        if ($stmt->execute()) {
            $message = "Password berhasil diubah!";
        } else {
            $message = "Terjadi kesalahan saat mengubah password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center">Edit Profile</h3>
    
    <?php if (!empty($message)): ?>
        <div class="alert <?= strpos($message, 'berhasil') !== false ? 'alert-success' : 'alert-danger' ?>" role="alert">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form action="edit_profile.php" method="post">
        <div class="form-group">
            <label for="password_baru">Password Baru</label>
            <input type="password" class="form-control" id="password_baru" name="password_baru" required>
        </div>
        <div class="form-group">
            <label for="konfirmasi_password">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
