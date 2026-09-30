<?php

require "../includes/auth.php";

$title = "Dashboard Admin";

$base = "../";

include "../includes/header.php";

?>

<div class="page-head">

    <div>

        <h1>
            Dashboard Admin
        </h1>

        <p>
            Selamat datang,
            <b>
                <?= htmlspecialchars(
                    $_SESSION["admin"]["nama"]
                ) ?>
            </b>
        </p>

    </div>

</div>


<div class="cards">

    <a
        href="produk.php"
        class="category"
    >

        <h3>
            Kelola Produk
        </h3>

        <p>
            Melihat, menambah, mengedit,
            dan menghapus produk.
        </p>

    </a>


    <a
        href="tambah.php"
        class="category"
    >

        <h3>
            Tambah Produk
        </h3>

        <p>
            Tambahkan produk pakaian baru.
        </p>

    </a>

</div>


<a
    href="produk.php"
    class="btn"
>
    Kelola Produk
</a>


<a
    href="logout.php"
    class="btn"
>
    Logout
</a>


<?php

include "../includes/footer.php";

?>