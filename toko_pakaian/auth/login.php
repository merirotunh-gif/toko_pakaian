<?php

session_start();

if (isset($_SESSION["admin"])) {

    header("Location: ../admin/index.php");

    exit;

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
        Login Admin
    </title>

    <link
        rel="stylesheet"
        href="../assets/style.css"
    >

</head>

<body>


<div class="login-box">

    <h1>
        Login Admin
    </h1>


    <?php if (isset($_GET["error"])): ?>

        <div class="flash">
            Email atau password salah.
        </div>

    <?php endif; ?>


    <form
        action="proses_login.php"
        method="POST"
    >

        <label>
            Email
        </label>

        <input
            type="email"
            name="email"
            required
        >


        <label>
            Password
        </label>

        <input
            type="password"
            name="password"
            required
        >


        <button
            type="submit"
            class="btn"
        >
            Login
        </button>

    </form>

</div>


</body>

</html>