<?php

session_start();

if (!isset($_SESSION["admin"])) {

    header("Location: login.php");
    exit();
}

include "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $course = trim($_POST["course"]);
    $dob = $_POST["dob"];

    // Photo Upload
    $photoName = $_FILES["photo"]["name"];
    $tmpName = $_FILES["photo"]["tmp_name"];

    $target =
    "uploads/" . time() . "_" . $photoName;

    move_uploaded_file($tmpName, $target);

    // Prepared Statement
    $sql = "INSERT INTO students
    (name, email, phone, course, dob, photo)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssss",
        $name,
        $email,
        $phone,
        $course,
        $dob,
        $target
    );

    if (mysqli_stmt_execute($stmt)) {

        $message =
        "<div class='alert alert-success'>
            Student Added Successfully
        </div>";

    } else {

        $message =
        "<div class='alert alert-danger'>
            Failed to Add Student
        </div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Student</title>

<meta name="viewport"
content="width=device-width, initial-scale=1">

<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="mb-4">
            Add Student
        </h2>

        <?php echo $message; ?>

        <form method="POST"
              enctype="multipart/form-data"
              id="studentForm">

            <div class="mb-3">

                <label>Name</label>

                <input type="text"
                       name="name"
                       id="name"
                       class="form-control">

                <small id="nameError"
                       class="text-danger"></small>

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input type="text"
                       name="email"
                       id="email"
                       class="form-control">

                <small id="emailError"
                       class="text-danger"></small>

            </div>

            <div class="mb-3">

                <label>Phone</label>

                <input type="text"
                       name="phone"
                       id="phone"
                       class="form-control">

                <small id="phoneError"
                       class="text-danger"></small>

            </div>

            <div class="mb-3">

                <label>Course</label>

                <input type="text"
                       name="course"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Date of Birth</label>

                <input type="date"
                       name="dob"
                       id="dob"
                       class="form-control">

                <small id="dobError"
                       class="text-danger"></small>

            </div>

            <div class="mb-3">

                <label>Profile Photo</label>

                <input type="file"
                       name="photo"
                       id="photo"
                       class="form-control">

                <small id="photoError"
                       class="text-danger"></small>

            </div>

            <button class=
            "btn btn-primary">

                Add Student
            </button>

        </form>

    </div>

</div>

<script src=
"https://code.jquery.com/jquery-3.7.1.min.js">
</script>

<script src=
"assets/js/validation.js">
</script>

</body>
</html>