<?php

require "config/database.php";

$title = "FashionKita";

include "includes/header.php";

?>

<section class="hero">

    <div>

        <span class="badge">
            KOLEKSI TERBARU
        </span>

        <h1>
            Fashion untuk Semua
        </h1>

        <p>
            Temukan berbagai pilihan pakaian untuk
            wanita, pria, dan anak-anak dengan
            model yang nyaman dan menarik.
        </p>

        <a
            href="produk.php"
            class="btn"
        >
            Lihat Produk
        </a>

    </div>

</section>


<h2>
    Kategori Pakaian
</h2>


<div class="cards">

    <a
        href="produk.php?kategori=Dewasa Wanita"
        class="category"
    >

        <h3>
            Baju Dewasa Cewek
        </h3>

        <p>
            Dress, blouse, tunik, dan berbagai
            pakaian wanita.
        </p>

    </a>


    <a
        href="produk.php?kategori=Dewasa Pria"
        class="category"
    >

        <h3>
            Baju Dewasa Cowok
        </h3>

        <p>
            Kaos, kemeja, jaket, dan pakaian pria.
        </p>

    </a>


    <a
        href="produk.php?kategori=Anak-anak"
        class="category"
    >

        <h3>
            Baju Anak-anak
        </h3>

        <p>
            Pakaian anak cowok dan cewek.
        </p>

    </a>

</div>


<?php

include "includes/footer.php";

?>