<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Read file
    $users = file("users.txt");

    $isValidUser = false;

    foreach ($users as $user) {

        // Split username and password
        list($storedUsername, $storedPassword) =
            explode(",", trim($user));

        // Validate login
        if (
            $username === $storedUsername &&
            $password === $storedPassword
        ) {

            $isValidUser = true;

            // Store session
            $_SESSION["username"] = $username;

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        }
    }

    if (!$isValidUser) {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login System</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Login Form</h2>

    <form method="POST">

        <input type="text"
               name="username"
               placeholder="Enter Username"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit">Login</button>

        <p class="error">
            <?php echo $error; ?>
        </p>

    </form>

</div>

</body>
</html>