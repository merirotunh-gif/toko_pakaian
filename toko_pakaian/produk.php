<?php

require "config/database.php";

$title = "Produk - FashionKita";

include "includes/header.php";

$kategori = $_GET["kategori"] ?? "";

if ($kategori != "") {

    $stmt = $conn->prepare(
        "SELECT * FROM produk
         WHERE kategori = ?
         ORDER BY id DESC"
    );

    $stmt->bind_param(
        "s",
        $kategori
    );

} else {

    $stmt = $conn->prepare(
        "SELECT * FROM produk
         ORDER BY id DESC"
    );

}

$stmt->execute();

$result = $stmt->get_result();

?>

<div class="page-head">

    <div>

        <h1>
            Produk Pakaian
        </h1>

        <p>

            <?php

            if ($kategori != "") {

                echo "Kategori: " .
                     htmlspecialchars($kategori);

            } else {

                echo "Semua produk pakaian";

            }

            ?>

        </p>

    </div>

</div>


<div class="grid">

<?php

if ($result->num_rows > 0):

    while ($produk = $result->fetch_assoc()):

?>

<article class="product">

    <div class="product-img">

        <?php if (!empty($produk["gambar"])): ?>

            <img
                src="<?= htmlspecialchars($produk["gambar"]) ?>"
                alt="<?= htmlspecialchars($produk["nama"]) ?>"
            >

        <?php else: ?>

            <span>
                Tidak ada gambar
            </span>

        <?php endif; ?>

    </div>


    <div class="product-body">

        <small>
            <?= htmlspecialchars($produk["kategori"]) ?>
        </small>

        <h3>
            <?= htmlspecialchars($produk["nama"]) ?>
        </h3>

        <p>
            <?= htmlspecialchars($produk["deskripsi"]) ?>
        </p>

        <strong>
            Rp <?= number_format(
                $produk["harga"],
                0,
                ",",
                "."
            ) ?>
        </strong>

        <br><br>

        <a
            href="detail.php?id=<?= $produk["id"] ?>"
            class="btn small"
        >
            Lihat Detail
        </a>

    </div>

</article>

<?php

    endwhile;

else:

?>

<p>
    Produk belum tersedia.
</p>

<?php endif; ?>

</div>


<?php

include "includes/footer.php";

?>