<?php

require "../includes/auth.php";

$title = "Tambah Produk";

$base = "../";

include "../includes/header.php";

?>

<h1>
    Tambah Produk
</h1>


<form
    action="proses_produk.php"
    method="POST"
    enctype="multipart/form-data"
>

    <input
        type="hidden"
        name="aksi"
        value="tambah"
    >


    <label>
        Nama Produk
    </label>

    <input
        type="text"
        name="nama"
        placeholder="Contoh: Kaos Oversize Wanita"
        required
    >


    <label>
        Kategori
    </label>

    <select
        name="kategori"
        required
    >

        <option value="">
            -- Pilih Kategori --
        </option>

        <option value="Dewasa Wanita">
            Baju Dewasa Cewek
        </option>

        <option value="Dewasa Pria">
            Baju Dewasa Cowok
        </option>

        <option value="Anak-anak">
            Baju Anak-anak
        </option>

    </select>


    <label>
        Harga
    </label>

    <input
        type="number"
        name="harga"
        min="0"
        placeholder="Contoh: 150000"
        required
    >


    <label>
        Stok
    </label>

    <input
        type="number"
        name="stok"
        min="0"
        required
    >


    <label>
        Foto Produk
    </label>

    <input
        type="file"
        name="gambar"
        accept="image/jpeg,image/png,image/jpg,image/webp"
        required
    >

    <small>
        Format: JPG, JPEG, PNG, atau WEBP.
        Maksimal 2 MB.
    </small>


    <label>
        Deskripsi
    </label>

    <textarea
        name="deskripsi"
        rows="5"
        placeholder="Deskripsi produk..."
    ></textarea>


    <button
        type="submit"
        class="btn"
    >
        Simpan Produk
    </button>

</form>


<?php

include "../includes/footer.php";

?>