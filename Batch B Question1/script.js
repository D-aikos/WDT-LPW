// Select form
const form = document.getElementById("registrationForm");

// Form submit event
form.addEventListener("submit", function (event) {

  // Prevent page refresh
  event.preventDefault();

  // Get input values
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword =
    document.getElementById("confirmPassword").value;

  // Error elements
  const nameError =
    document.getElementById("nameError");

  const emailError =
    document.getElementById("emailError");

  const passwordError =
    document.getElementById("passwordError");

  const confirmPasswordError =
    document.getElementById("confirmPasswordError");

  const successMessage =
    document.getElementById("successMessage");

  // Clear old messages
  nameError.textContent = "";
  emailError.textContent = "";
  passwordError.textContent = "";
  confirmPasswordError.textContent = "";
  successMessage.textContent = "";

  let isValid = true;

    // Name validation
    const namePattern = /^[A-Za-z\s]+$/;

    if (name === "") {
    nameError.textContent = "Name is required";
    isValid = false;

    } else if (!namePattern.test(name)) {
    nameError.textContent =
        "Name should contain only alphabets";

    isValid = false;
    }

  // Email validation
  const emailPattern =
    /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (email === "") {
    emailError.textContent = "Email is required";
    isValid = false;

  } else if (!emailPattern.test(email)) {
    emailError.textContent = "Invalid email format";
    isValid = false;
  }

  // Password validation
  if (password.length < 6) {
    passwordError.textContent =
      "Password must contain at least 6 characters";

    isValid = false;
  }

  // Confirm password validation
  if (confirmPassword !== password) {
    confirmPasswordError.textContent =
      "Passwords do not match";

    isValid = false;
  }

  // Success
  if (isValid) {
    successMessage.textContent =
      "Registration Successful!";
    
    confetti({
      particleCount: 300,
      spread: 180,
      startVelocity: 40,
      scalar: 1.2
    });

    const successGif =
      document.getElementById("successGif");

    successGif.style.display = "block";

    form.reset();
  }
});