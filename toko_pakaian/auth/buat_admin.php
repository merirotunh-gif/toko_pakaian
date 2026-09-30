<?php

require "../config/database.php";

$nama = "Administrator";
$email = "admin@gmail.com";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO admin (nama, email, password)
     VALUES (?, ?, ?)"
);

if (!$stmt) {
    die("Error: " . $conn->error);
}

$stmt->bind_param(
    "sss",
    $nama,
    $email,
    $password
);

if ($stmt->execute()) {
    echo "<h2>Admin berhasil dibuat!</h2>";
    echo "Email: admin@gmail.com<br>";
    echo "Password: admin123";
} else {
    echo "<h2>Gagal membuat admin</h2>";
    echo "Error: " . $stmt->error;
}

?>