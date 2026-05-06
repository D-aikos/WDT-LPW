<?php
session_start();

include "config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin_users
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION["admin"] = $username;

        header("Location: index.php");
        exit();

    } else {
        $error = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
          href="assets/css/style.css">

</head>

<body class="bg-dark">

<div class="container">

    <div class="row justify-content-center
                align-items-center vh-100">

        <div class="col-md-4">

            <div class="card p-4 shadow">

                <h2 class="text-center mb-4">
                    Student Portal Login
                </h2>

                <form method="POST">

                    <input type="text"
                           name="username"
                           class="form-control mb-3"
                           placeholder="Username"
                           required>

                    <input type="password"
                           name="password"
                           class="form-control mb-3"
                           placeholder="Password"
                           required>

                    <button class=
                    "btn btn-primary w-100">

                        Login
                    </button>

                </form>

                <p class="text-danger mt-3">
                    <?php echo $error; ?>
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>