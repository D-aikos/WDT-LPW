<?php

include "config.php";

if (isset($_POST["id"])) {

    $id = $_POST["id"];

    // Get image path first
    $query =
    "SELECT photo FROM students
     WHERE id='$id'";

    $result = mysqli_query($conn, $query);

    $student = mysqli_fetch_assoc($result);

    // Delete image file
    if ($student && file_exists($student["photo"])) {

        unlink($student["photo"]);
    }

    // Delete record
    $sql =
    "DELETE FROM students
     WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        echo "success";

    } else {

        echo "error";
    }
}
?>