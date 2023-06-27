<?php
$name = $_POST["name"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$zip = $_POST["zip"];
$cname = $_POST["cname"];
$cardno = $_POST["cardno"];
$exp = $_POST["exp"];
$month = $_POST["month"];
$vvc = $_POST["vvc"];

$host = "localhost";
$dbname = "checkout_db";
$username = "root";
$password = "";

$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $dbname
);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO checkout (name, email, address, city, zip, cname, cardno, exp, month, vvc)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die("Statement preparation error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssisiisi",
    $name,
    $email,
    $address,
    $city,
    $zip,
    $cname,
    $cardno,
    $exp,
    $month,
    $vvc
);

if (mysqli_stmt_execute($stmt)) {
    // Redirect to maintenance.html or remove this block if not needed
    header("Location: maintenance.html");
    exit;
} else {
    die($conn->error . " " . $conn->errno);
}

echo "Order Placed.";
