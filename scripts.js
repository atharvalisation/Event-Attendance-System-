document.getElementById('loginBtn').addEventListener('click', function() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Dummy verification - Replace with server-side logic
    if (username === "admin" && password === "password") {
        window.location.href = "http://localhost/faculty-portal/register_faculty.php";
    } else {
        document.getElementById('errorMessage').textContent = "Invalid credentials!";
    }
});
