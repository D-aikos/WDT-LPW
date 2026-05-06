$("#studentForm").submit(function (e) {

    let valid = true;

    $(".text-danger").text("");

    // Name Validation
    let name = $("#name").val().trim();

    let nameRegex = /^[A-Za-z\s]{3,}$/;

    if (!nameRegex.test(name)) {

        $("#nameError").text(
            "Enter valid name"
        );

        valid = false;
    }

    // Email Validation
    let email = $("#email").val().trim();

    let emailRegex =
    /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (!emailRegex.test(email)) {

        $("#emailError").text(
            "Invalid email"
        );

        valid = false;
    }

    // Phone Validation
    let phone = $("#phone").val().trim();

    let phoneRegex = /^[0-9]{10}$/;

    if (!phoneRegex.test(phone)) {

        $("#phoneError").text(
            "Enter 10 digit number"
        );

        valid = false;
    }

    // DOB Validation
    let dob = $("#dob").val();

    let today = new Date()
        .toISOString()
        .split("T")[0];

    if (dob > today) {

        $("#dobError").text(
            "Future date invalid"
        );

        valid = false;
    }

    // Photo Validation
    let photo = $("#photo").val();

    let allowed =
    /\.(jpg|jpeg|png)$/i;

    if (!allowed.exec(photo)) {

        $("#photoError").text(
            "Only JPG/PNG allowed"
        );

        valid = false;
    }

    if (!valid) {
        e.preventDefault();
    }
});