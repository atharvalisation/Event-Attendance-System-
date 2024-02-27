<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $college = $_POST['college'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $kit_provided = $_POST['kit_provided'];

    $sql = "INSERT INTO faculty_details (name, college, mobile_number, email, role, kit_provided) VALUES ('$name', '$college', '$mobile_number', '$email', '$role', '$kit_provided')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Faculty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 30;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 100;
        }

        h1 {
            margin-bottom: 40px;
            font-weight: bold;
            color: #007BFF;
        }

        header {
            width: 100%;
            background-color: #333;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        header nav {
            display: flex;
            justify-content: space-around;
            max-width: 900px;
            margin: 0 auto;
        }

        header nav a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        header nav a:hover {
            background-color: #555;
        }

        form {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.1);
            width: 90%;
            max-width: 600px;
            margin-top: 80px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="radio"],
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #333;
            font-size: 16px;
            background-color: #333;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        input[type="submit"] {
            background-color: #007BFF;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            header nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            header nav a {
                margin: 5px;
                padding: 8px 16px;
                font-size: 14px;
            }

            h1 {
                font-size: 28px;
                margin-bottom: 30px;
            }

            form {
                margin-top: 120px;
            }
        }

.modal {
    display: <?php echo $record_added ? 'block' : 'none'; ?>;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.8); /* Darkened background for a true dark mode feel */
    -webkit-overflow-scrolling: touch;
    margin-top: 80;
}

.modal-content {
    background-color: #333; /* Dark background */
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #555; /* Slightly lighter border color */
    width: 80%;
    max-width: 500px;
    color: #ddd; /* Light text color for better contrast */
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #fff; /* Brighter close icon color for better visibility */
    text-decoration: none;
    cursor: pointer;
}

@media (max-width: 600px) {
    .modal-content {
        margin: 30% auto;
        padding: 15px;
    }
}
    </style>
</head>

<body>

    <header>
        <nav>
            <a href="/faculty-portal/day_one_attendace.php">Day 1</a>
            <a href="/faculty-portal/day_two_attendace.php">Day 2</a>
            <a href="/faculty-portal/day_three_attendace.php">Day 3</a>
            <a href="/faculty-portal/day_four_attendace.php">Day 4</a>
            <a href="/faculty-portal/day_five_attendace.php">Day 5</a>
            <a href="/faculty-portal/day_six_attendace.php">Day 6</a>
        </nav>
    </header>

    <h1>Faculty Registration Portal</h1>

    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="college">College:</label>
        <input type="text" name="college" required>

        <label for="mobile_number">Mobile Number:</label>
        <input type="tel" name="mobile_number" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="role">Role:</label>
        <input type="text" name="role" required>

        <label>Kit Provided:</label>
        <input type="radio" name="kit_provided" value="Yes" required> Yes
        <input type="radio" name="kit_provided" value="No"> No

        <input type="submit" value="Register">
    </form>

    <!-- Modal Popup -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Record added successfully!</p>
        </div>
    </div>

    <script>
        // Close modal when the '×' button is clicked
        var closeBtn = document.querySelector('.close');
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                document.getElementById('myModal').style.display = "none";
            });
        }
    </script>

</body>

</html>



