<?php

require "../includes/auth.php";

require "../config/database.php";


$id = (int)($_GET["id"] ?? 0);


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

$produk = $result->fetch_assoc();


if (!$produk) {

    die("Produk tidak ditemukan.");

}


$title = "Edit Produk";

$base = "../";

include "../includes/header.php";

?>

<h1>
    Edit Produk
</h1>


<form
    action="proses_produk.php"
    method="POST"
    enctype="multipart/form-data"
>

    <input
        type="hidden"
        name="aksi"
        value="edit"
    >


    <input
        type="hidden"
        name="id"
        value="<?= $produk["id"] ?>"
    >


    <label>
        Nama Produk
    </label>

    <input
        type="text"
        name="nama"
        value="<?= htmlspecialchars($produk["nama"]) ?>"
        required
    >


    <label>
        Kategori
    </label>

    <select
        name="kategori"
        required
    >

        <option
            value="Dewasa Wanita"
            <?= $produk["kategori"] == "Dewasa Wanita" ? "selected" : "" ?>
        >
            Baju Dewasa Cewek
        </option>


        <option
            value="Dewasa Pria"
            <?= $produk["kategori"] == "Dewasa Pria" ? "selected" : "" ?>
        >
            Baju Dewasa Cowok
        </option>


        <option
            value="Anak-anak"
            <?= $produk["kategori"] == "Anak-anak" ? "selected" : "" ?>
        >
            Baju Anak-anak
        </option>

    </select>


    <label>
        Harga
    </label>

    <input
        type="number"
        name="harga"
        value="<?= $produk["harga"] ?>"
        required
    >


    <label>
        Stok
    </label>

    <input
        type="number"
        name="stok"
        value="<?= $produk["stok"] ?>"
        required
    >


    <label>
        Foto Baru
    </label>

    <input
        type="file"
        name="gambar"
        accept="image/jpeg,image/png,image/jpg,image/webp"
    >

    <small>
        Kosongkan jika tidak ingin mengganti foto.
    </small>


    <?php if (!empty($produk["gambar"])): ?>

        <div class="preview">

            <p>
                Foto saat ini:
            </p>

            <img
                src="../<?= htmlspecialchars($produk["gambar"]) ?>"
                alt="Foto produk"
            >

        </div>

    <?php endif; ?>


    <label>
        Deskripsi
    </label>

    <textarea
        name="deskripsi"
        rows="5"
    ><?= htmlspecialchars($produk["deskripsi"]) ?></textarea>


    <button
        type="submit"
        class="btn"
    >
        Update Produk
    </button>

</form>


<?php

include "../includes/footer.php";

?>