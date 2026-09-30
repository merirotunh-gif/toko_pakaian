<?php

require "../includes/auth.php";

require "../config/database.php";


$aksi = $_POST["aksi"] ?? "";


$nama = trim(
    $_POST["nama"] ?? ""
);

$kategori = trim(
    $_POST["kategori"] ?? ""
);

$harga = (int)(
    $_POST["harga"] ?? 0
);

$stok = (int)(
    $_POST["stok"] ?? 0
);

$deskripsi = trim(
    $_POST["deskripsi"] ?? ""
);


/*
|--------------------------------------------------------------------------
| FUNGSI UPLOAD GAMBAR
|--------------------------------------------------------------------------
*/

function uploadGambar()
{

    if (
        !isset($_FILES["gambar"]) ||
        $_FILES["gambar"]["error"] === UPLOAD_ERR_NO_FILE
    ) {

        return null;

    }


    if (
        $_FILES["gambar"]["error"] !== UPLOAD_ERR_OK
    ) {

        die("Gagal mengupload gambar.");

    }


    // Maksimal 2 MB

    if (
        $_FILES["gambar"]["size"] > 2 * 1024 * 1024
    ) {

        die("Ukuran gambar maksimal 2 MB.");

    }


    $namaAsli = $_FILES["gambar"]["name"];

    $tmp = $_FILES["gambar"]["tmp_name"];


    $ekstensi = strtolower(
        pathinfo(
            $namaAsli,
            PATHINFO_EXTENSION
        )
    );


    $ekstensiValid = [
        "jpg",
        "jpeg",
        "png",
        "webp"
    ];


    if (
        !in_array(
            $ekstensi,
            $ekstensiValid
        )
    ) {

        die(
            "Format gambar harus JPG, JPEG, PNG, atau WEBP."
        );

    }


    // Mengecek apakah file benar-benar gambar

    if (
        getimagesize($tmp) === false
    ) {

        die(
            "File yang diupload bukan gambar."
        );

    }


    $folder = "../uploads/produk/";


    if (!is_dir($folder)) {

        mkdir(
            $folder,
            0777,
            true
        );

    }


    // Nama file dibuat unik

    $namaBaru =
        uniqid("produk_", true)
        . "."
        . $ekstensi;


    $tujuan =
        $folder . $namaBaru;


    if (
        !move_uploaded_file(
            $tmp,
            $tujuan
        )
    ) {

        die(
            "Gambar gagal disimpan."
        );

    }


    return "uploads/produk/" . $namaBaru;
}


/*
|--------------------------------------------------------------------------
| CREATE - TAMBAH PRODUK
|--------------------------------------------------------------------------
*/

if ($aksi === "tambah") {


    $gambar = uploadGambar();


    $stmt = $conn->prepare(
        "INSERT INTO produk
        (
            nama,
            kategori,
            harga,
            stok,
            gambar,
            deskripsi
        )
        VALUES (?, ?, ?, ?, ?, ?)"
    );


    $stmt->bind_param(
        "ssiiss",
        $nama,
        $kategori,
        $harga,
        $stok,
        $gambar,
        $deskripsi
    );


    $stmt->execute();


    header(
        "Location: produk.php"
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| UPDATE - EDIT PRODUK
|--------------------------------------------------------------------------
*/

if ($aksi === "edit") {


    $id = (int)(
        $_POST["id"] ?? 0
    );


    // Ambil data lama

    $stmt = $conn->prepare(
        "SELECT * FROM produk
         WHERE id = ?"
    );

    $stmt->bind_param(
        "i",
        $id
    );

    $stmt->execute();

    $result = $stmt->get_result();

    $produkLama = $result->fetch_assoc();


    if (!$produkLama) {

        die(
            "Produk tidak ditemukan."
        );

    }


    // Cek apakah user memilih foto baru

    $gambarBaru = uploadGambar();


    if ($gambarBaru !== null) {


        // Hapus foto lama

        if (
            !empty($produkLama["gambar"])
        ) {

            $fileLama =
                "../" .
                $produkLama["gambar"];


            if (
                file_exists($fileLama)
            ) {

                unlink($fileLama);

            }

        }


        $gambar =
            $gambarBaru;


    } else {


        // Tetap menggunakan foto lama

        $gambar =
            $produkLama["gambar"];

    }


    $stmt = $conn->prepare(
        "UPDATE produk SET

            nama = ?,

            kategori = ?,

            harga = ?,

            stok = ?,

            gambar = ?,

            deskripsi = ?

         WHERE id = ?"
    );


    $stmt->bind_param(
        "ssiissi",
        $nama,
        $kategori,
        $harga,
        $stok,
        $gambar,
        $deskripsi,
        $id
    );


    $stmt->execute();


    header(
        "Location: produk.php"
    );

    exit;
}


die(
    "Aksi tidak ditemukan."
);

?>