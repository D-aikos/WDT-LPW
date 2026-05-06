<?php

session_start();

if (!isset($_SESSION["admin"])) {

    header("Location: login.php");
    exit();
}

include "config.php";

$id = $_GET["id"];

$query =
"SELECT * FROM students
 WHERE id='$id'";

$result =
mysqli_query($conn, $query);

$student =
mysqli_fetch_assoc($result);

$message = "";

// Update Student
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $course = $_POST["course"];
    $dob = $_POST["dob"];

    $sql =
    "UPDATE students SET

    name=?,
    email=?,
    phone=?,
    course=?,
    dob=?

    WHERE id=?";

    $stmt =
    mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(

        $stmt,

        "sssssi",

        $name,
        $email,
        $phone,
        $course,
        $dob,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {

        $message =
        "<div class='alert alert-success'>
            Student Updated Successfully
        </div>";

        // Refresh student data
        $result =
        mysqli_query($conn, $query);

        $student =
        mysqli_fetch_assoc($result);

    } else {

        $message =
        "<div class='alert alert-danger'>
            Update Failed
        </div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Student</title>

<meta name="viewport"
content="width=device-width,
initial-scale=1">

<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"

rel="stylesheet">

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="container mt-5">

    <div class="card p-4">

        <div class=
        "d-flex justify-content-between">

            <h2>Edit Student</h2>

            <a href="view_students.php"
               class="btn btn-secondary">

               Back
            </a>

        </div>

        <?php echo $message; ?>

        <form method="POST">

            <div class="mb-3">

                <label>Name</label>

                <input type="text"

                       name="name"

                       class="form-control"

                       value=
"<?php echo $student['name']; ?>"

                       required>
            </div>

            <div class="mb-3">

                <label>Email</label>

                <input type="email"

                       name="email"

                       class="form-control"

                       value=
"<?php echo $student['email']; ?>"

                       required>
            </div>

            <div class="mb-3">

                <label>Phone</label>

                <input type="text"

                       name="phone"

                       class="form-control"

                       value=
"<?php echo $student['phone']; ?>"

                       required>
            </div>

            <div class="mb-3">

                <label>Course</label>

                <input type="text"

                       name="course"

                       class="form-control"

                       value=
"<?php echo $student['course']; ?>"

                       required>
            </div>

            <div class="mb-3">

                <label>DOB</label>

                <input type="date"

                       name="dob"

                       class="form-control"

                       value=
"<?php echo $student['dob']; ?>"

                       required>
            </div>

            <button class=
            "btn btn-primary">

                Update Student

            </button>

        </form>

    </div>

</div>

</body>
</html>