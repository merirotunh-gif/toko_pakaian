<?php

require "../includes/auth.php";

require "../config/database.php";

$title = "Kelola Produk";

$base = "../";

include "../includes/header.php";


$result = $conn->query(
    "SELECT * FROM produk
     ORDER BY id DESC"
);

?>

<div class="page-head">

    <div>

        <h1>
            Kelola Produk
        </h1>

        <p>
            Tambah, edit, dan hapus produk.
        </p>

    </div>


    <a
        href="tambah.php"
        class="btn"
    >
        + Tambah Produk
    </a>

</div>


<table>

<thead>

<tr>

    <th>
        No
    </th>

    <th>
        Gambar
    </th>

    <th>
        Nama
    </th>

    <th>
        Kategori
    </th>

    <th>
        Harga
    </th>

    <th>
        Stok
    </th>

    <th>
        Aksi
    </th>

</tr>

</thead>


<tbody>

<?php

$no = 1;

while ($produk = $result->fetch_assoc()):

?>

<tr>

    <td>
        <?= $no++ ?>
    </td>


    <td>

        <?php if (!empty($produk["gambar"])): ?>

            <img
                src="../<?= htmlspecialchars($produk["gambar"]) ?>"
                class="table-img"
                alt="gambar"
            >

        <?php else: ?>

            Tidak ada

        <?php endif; ?>

    </td>


    <td>
        <?= htmlspecialchars($produk["nama"]) ?>
    </td>


    <td>
        <?= htmlspecialchars($produk["kategori"]) ?>
    </td>


    <td>
        Rp <?= number_format(
            $produk["harga"],
            0,
            ",",
            "."
        ) ?>
    </td>


    <td>
        <?= $produk["stok"] ?>
    </td>


    <td>

        <a
            href="edit.php?id=<?= $produk["id"] ?>"
        >
            Edit
        </a>

        |

        <a
            href="hapus.php?id=<?= $produk["id"] ?>"
            onclick="return confirm('Yakin ingin menghapus produk ini?')"
        >
            Hapus
        </a>

    </td>

</tr>

<?php endwhile; ?>

</tbody>

</table>


<?php

include "../includes/footer.php";

?>