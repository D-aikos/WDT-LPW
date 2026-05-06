<?php

include "config.php";

$search = $_GET["search"];

$sql =
"SELECT * FROM students
WHERE
name LIKE '%$search%'
OR
course LIKE '%$search%'
OR
email LIKE '%$search%'
ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

$students = [];

while ($row = mysqli_fetch_assoc($result)) {

    $students[] = $row;
}

echo json_encode($students);

?>