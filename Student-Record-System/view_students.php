<?php

session_start();

if (!isset($_SESSION["admin"])) {

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>View Students</title>

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

        <!-- Yuji GIF -->
        <div class="text-center">

            <img
            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F28%2F2a%2Faf%2F282aaf18c0dbf4822f5e54a9122889a4.jpg&f=1&nofb=1&ipt=50e502baead3da238c3bee06163ade998d73c3b944f47126d12f728876488fcb"
            width="720"
            class="mb-3 rounded">

        </div>

        <div class=
        "d-flex justify-content-between
         align-items-center">

            <h2>Students List</h2>

            <a href="index.php"
               class="btn btn-secondary">

               Back
            </a>

        </div>

        <input type="text"
            id="searchInput"

            class="form-control mb-3"

            placeholder="Search students...">

        <table class=
        "table table-dark table-hover mt-4">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>DOB</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody id="studentTable">

            </tbody>

        </table>

    </div>

</div>

<!-- Delete Modal -->

<div class="modal fade"
     id="deleteModal"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content
                    bg-dark text-white">

            <div class="modal-header">

                <h5 class="modal-title">
                    Confirm Delete
                </h5>

                <button type="button"
                        class="btn-close
                               btn-close-white"

                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body text-center">

                <!-- Toji GIF -->

                <img
                src="https://media.tenor.com/8ZZ96vFkFHAAAAAM/toji-fushiguro.gif"

                width="120"

                class="mb-3 rounded">

                <p>
                    Are you sure you want
                    to delete this student?
                </p>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"

                        data-bs-dismiss="modal">

                    Cancel
                </button>

                <button type="button"
                        class="btn btn-danger"
                        id="confirmDelete">

                    Delete
                </button>

            </div>

        </div>

    </div>

</div>

<script src=
"https://code.jquery.com/jquery-3.7.1.min.js">
</script>

<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

<script src=
"assets/js/students.js">
</script>

</body>
</html>