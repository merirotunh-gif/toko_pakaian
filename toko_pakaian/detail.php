<?php

require "config/database.php";

$id = (int)($_GET["id"] ?? 0);

$stmt = $conn->prepare(
    "SELECT * FROM produk WHERE id = ?"
);

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();

$result = $stmt->get_result();

$produk = $result->fetch_assoc();

if (!$produk) {

    die("Produk tidak ditemukan.");

}

$title = $produk["nama"];

include "includes/header.php";

?>

<div class="detail">

    <div class="detail-img">

        <?php if (!empty($produk["gambar"])): ?>

            <img
                src="<?= htmlspecialchars($produk["gambar"]) ?>"
                alt="<?= htmlspecialchars($produk["nama"]) ?>"
            >

        <?php endif; ?>

    </div>


    <div>

        <small>
            <?= htmlspecialchars($produk["kategori"]) ?>
        </small>

        <h1>
            <?= htmlspecialchars($produk["nama"]) ?>
        </h1>

        <h2>
            Rp <?= number_format(
                $produk["harga"],
                0,
                ",",
                "."
            ) ?>
        </h2>

        <p>
            <?= nl2br(
                htmlspecialchars(
                    $produk["deskripsi"]
                )
            ) ?>
        </p>

        <p>
            <b>
                Stok:
            </b>

            <?= $produk["stok"] ?>
        </p>

        <a
            href="produk.php"
            class="btn"
        >
            Kembali
        </a>

    </div>

</div>


<?php

include "includes/footer.php";

?>