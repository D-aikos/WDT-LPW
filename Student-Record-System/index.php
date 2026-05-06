<?php
session_start();

if (!isset($_SESSION["admin"])) {

    header("Location: login.php");
    exit();
}

include "config.php";

$query =
"SELECT COUNT(*) AS total FROM students";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$totalStudents = $row["total"];
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<nav class=
"navbar navbar-dark bg-dark px-4">

    <span class="navbar-brand">
        Student Record System
    </span>

    <div>

        Welcome,
        <?php echo $_SESSION["admin"]; ?>

        <a href="logout.php"
           class="btn btn-danger ms-3">

           Logout
        </a>

    </div>

</nav>

<div class="container mt-5">

    <div class="row g-4">

        <div class="col-md-4">

            <div class="card p-4 text-center">

                <h3>Total Students</h3>

                <h1>
                    <?php echo $totalStudents; ?>
                </h1>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card p-4 text-center">

                <h3>Add Student</h3>

                <a href="add_student.php"
                class="btn btn-primary mt-3">

                Add Now
                </a>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card p-4 text-center">

                <h3>View Students</h3>

                <a href="view_students.php"
                class="btn btn-success mt-3">

                View List
                </a>

            </div>

        </div>

    </div>
    
</div>

</body>
</html>