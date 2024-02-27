<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="dark-theme">
    <div class="container">
        <div class="card">
            <h2>Login to Continue</h2>
            <form id="loginForm">
                <div class="input-group">
                    <input type="text" id="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" placeholder="Password" required>
                </div>
                <button type="button" id="loginBtn">Login</button>
            </form>
            <p id="errorMessage" class="error-message"></p>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>

</html>
