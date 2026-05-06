<?php
session_start();

// Check if user logged in
if (!isset($_SESSION["username"])) {

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Welcome,
        <?php echo $_SESSION["username"]; ?>
    </h2>

    <p>You have successfully logged in.</p>

    <img
    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fgifdb.com%2Fimages%2Fhigh%2Fbongo-cat-498-x-498-gif-hmr9ejv3ndv7n489.gif&f=1&nofb=1&ipt=9106f757611ad31fada023b185a9ef0d3c749d16f4e5ad54f77021704639800d"
    alt="Welcome GIF"
    class="gif"
    />

    <a href="logout.php">
        <button>Logout</button>
    </a>

</div>

</body>
</html>