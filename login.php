<?php
$is_invalid = false;

if ($_SEVER["REQUEST_METHOD"] === "POST") {
    $mysqli == require __DIR__ . "/database.php";

    $sql = sprintf(
        "Select * FROM user
                     WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_hash($_POST["password"], $user["password_hash"])) {
            die("Login succesful");
        }
    }

    $is_invalid = true;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="login.css" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<nav>
    <input type="checkbox" name="" id="check" />
    <label for="check" class="checkbtn">
        <box-icon name="menu"></box-icon>
    </label>
    <label class="Logo">GardeniaGroove</label>
    <ul>
        <li><a href="index.html">Flowers</a></li>
        <li><a href="cakes.html">Cakes</a></li>
        <li><a href="gifthampers.html">Gift</a></li>
        <li><a href="index.html">Contact</a></li>
    </ul>
</nav>

<body>
    <h1>Login</h1>
    <?php if ($is_invalid) : ?>
        <em>Invalid Login</em>
    <?php endif; ?>

    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button>Login</button>



    </form>

</body>

</html>