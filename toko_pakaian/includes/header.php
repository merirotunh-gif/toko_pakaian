<?php

if (!isset($title)) {
    $title = "FashionKita";
}

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title) ?>
    </title>

    <link
        rel="stylesheet"
        href="<?= isset($base) ? $base : '' ?>assets/style.css"
    >

</head>

<body>


<header class="navbar">

    <div class="container nav-inner">

        <a
            href="<?= isset($base) ? $base : '' ?>index.php"
            class="brand"
        >
            FashionKita
        </a>


        <nav>

            <a href="<?= isset($base) ? $base : '' ?>index.php">
                Beranda
            </a>

            <a href="<?= isset($base) ? $base : '' ?>produk.php">
                Produk
            </a>

            <a href="<?= isset($base) ? $base : '' ?>tentang.php">
                Tentang
            </a>

            <a href="<?= isset($base) ? $base : '' ?>auth/login.php">
                Admin
            </a>

        </nav>

    </div>

</header>


<main class="container">