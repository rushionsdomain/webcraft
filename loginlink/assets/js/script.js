document
  .getElementById("registerForm")
  .addEventListener("submit", function (e) {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      e.preventDefault();
      alert("Please enter a valid email address.");
    } else if (password.length < 6) {
      e.preventDefault();
      alert("Password must be at least 6 characters long.");
    }
  });
