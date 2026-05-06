let deleteId = null;

$(document).ready(function () {

    loadStudents();

    // Live Search
    $("#searchInput").keyup(function () {

        let search =
        $(this).val();

        $.ajax({

            url: "search_students.php",

            type: "GET",

            data: {
                search: search
            },

            dataType: "json",

            success: function (data) {

                renderStudents(data);
            }
        });
    });
});

// Load All Students
function loadStudents() {

    $.ajax({

        url: "fetch_students.php",

        type: "GET",

        dataType: "json",

        success: function (data) {

            renderStudents(data);
        }
    });
}

// Render Table
function renderStudents(data) {

    let output = "";

    data.forEach(function (student) {

        output += `

        <tr id="row-${student.id}">

            <td>${student.id}</td>

            <td>

                <img
                src="${student.photo}"

                width="60"
                height="60"

                style="
                object-fit:cover;
                border-radius:10px;">

            </td>

            <td>${student.name}</td>

            <td>${student.email}</td>

            <td>${student.phone}</td>

            <td>${student.course}</td>

            <td>${student.dob}</td>

            <td>

                <a href=
                "edit_student.php?id=${student.id}"

                class=
                "btn btn-warning btn-sm me-2">

                Edit
                </a>

                <button
                class="btn btn-danger
                    btn-sm deleteBtn"

                data-id="${student.id}"

                data-bs-toggle="modal"

                data-bs-target="#deleteModal">

                Delete

                </button>

            </td>

        </tr>
        `;
    });

    $("#studentTable")
    .hide()
    .html(output)
    .fadeIn(500);
}

// Store Delete ID
$(document).on(
"click",
".deleteBtn",

function () {

    deleteId =
    $(this).data("id");
});

// Confirm Delete
$("#confirmDelete").click(function () {

    $.ajax({

        url: "delete_student.php",

        type: "POST",

        data: {
            id: deleteId
        },

        success: function (response) {

            if (response == "success") {

                $("#row-" + deleteId)
                .fadeOut(500, function () {

                    $(this).remove();
                });

                $("#deleteModal")
                .modal("hide");
            }
        }
    });
});