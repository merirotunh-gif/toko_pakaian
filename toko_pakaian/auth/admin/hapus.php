<?php

require "../includes/auth.php";

require "../config/database.php";


$id = (int)(
    $_GET["id"] ?? 0
);


// Ambil data produk

$stmt = $conn->prepare(
    "SELECT gambar FROM produk
     WHERE id = ?"
);

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();

$result = $stmt->get_result();

$produk = $result->fetch_assoc();


if (!$produk) {

    header(
        "Location: produk.php"
    );

    exit;

}


// Hapus gambar

if (!empty($produk["gambar"])) {

    $file =
        "../" .
        $produk["gambar"];


    if (file_exists($file)) {

        unlink($file);

    }

}


// Hapus data database

$stmt = $conn->prepare(
    "DELETE FROM produk
     WHERE id = ?"
);

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();


header(
    "Location: produk.php"
);

exit;

?>