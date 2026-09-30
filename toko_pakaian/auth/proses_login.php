<?php

session_start();

require "../config/database.php";

$email = $_POST["email"] ?? "";

$password = $_POST["password"] ?? "";


$stmt = $conn->prepare(
    "SELECT * FROM admin
     WHERE email = ?"
);

$stmt->bind_param(
    "s",
    $email
);

$stmt->execute();

$result = $stmt->get_result();

$admin = $result->fetch_assoc();


if (
    $admin &&
    password_verify(
        $password,
        $admin["password"]
    )
) {

    $_SESSION["admin"] = [

        "id" => $admin["id"],

        "nama" => $admin["nama"],

        "email" => $admin["email"]

    ];


    header(
        "Location: ../admin/index.php"
    );

    exit;

}


header(
    "Location: login.php?error=1"
);

exit;