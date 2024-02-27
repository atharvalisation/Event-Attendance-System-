<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchQuery = "";
$record_added = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process search query
    if (isset($_POST['search'])) {
        $searchQuery = $_POST['search_query'];
    }

    // Ensure $_POST['faculty_id'] is set and is an array before iterating
    if (isset($_POST['faculty_id']) && is_array($_POST['faculty_id'])) {
        foreach ($_POST['faculty_id'] as $id => $attendance) {
            // Fetch faculty name based on the faculty_id
            $fetchFacultySql = "SELECT name FROM faculty_details WHERE id = '$id'";
            $facultyResult = $conn->query($fetchFacultySql);
            if ($facultyResult->num_rows > 0) {
                $facultyRow = $facultyResult->fetch_assoc();
                $faculty_name = $facultyRow['name'];

                // Check if record exists for the faculty in day_one table
                $checkSql = "SELECT * FROM day_two WHERE faculty_id = '$id'";
                $checkResult = $conn->query($checkSql);

                if ($checkResult->num_rows > 0) {
                    // Update attendance if record exists
                    $updateSql = "UPDATE day_two SET attendance='$attendance', faculty_name='$faculty_name' WHERE faculty_id='$id'";
                    $conn->query($updateSql);
                } else {
                    // Insert new record if record doesn't exist
                    $insertSql = "INSERT INTO day_two (faculty_id, attendance, faculty_name) VALUES ('$id', '$attendance', '$faculty_name')";
                    $conn->query($insertSql);
                }
            }
        }
    }

    // Set $record_added when attendance is updated
    if (isset($_POST['saveAttendance'])) {
        $record_added = true;
    }
}

$sql = "SELECT f.id, f.name, f.mobile_number, d.attendance, d.faculty_name
        FROM faculty_details f 
        LEFT JOIN day_two d ON f.id = d.faculty_id";
if (!empty($searchQuery)) {
    $sql .= " WHERE f.name LIKE '%$searchQuery%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Two Attendance</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        h2 {
            padding: 20px;
            text-align: center;
            background-color: #333;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #555;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        input[type="submit"] {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Custom toggle styles for checkbox */
        input[type="checkbox"] {
            width: 40px;
            height: 20px;
            position: relative;
            -webkit-appearance: none;
            background-color: #555;
            outline: none;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: #007BFF;
        }

        input[type="checkbox"]::before {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: 2px;
            left: 2px;
            background-color: #fff;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        input[type="checkbox"]:checked::before {
            transform: translateX(20px);
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

    <h2>Mark Attendance for Day Two</h2>

    <!-- Search Form -->
    <form action="" method="post">
        <div style="margin-bottom: 20px;">
            <input type="text" name="search_query" placeholder="Search by name" value="<?php echo $searchQuery; ?>">
            <input type="submit" name="search" value="Search">
        </div>
    </form>

    <!-- Attendance Form -->
    <form action="" method="post">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['mobile_number']; ?></td>
                        <td>
                            <input type="hidden" name="faculty_id[<?php echo $row['id']; ?>]" value="0">
                            <input type="checkbox" name="faculty_id[<?php echo $row['id']; ?>]" value="1" <?php echo isset($row['attendance']) && $row['attendance'] == 1 ? 'checked' : ''; ?>>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <input type="submit" name="saveAttendance" value="Submit Attendance">
    </form>

 <!-- Pop-up modal for confirmation -->
 <?php if (isset($record_added)): ?>
    <div class="modal" id="confirmationModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Attendance updated successfully.</p>
        </div>
    </div>
    <?php endif; ?>

    <script>
        function openModal(id) {
            document.getElementById('facultyId').value = id;
            document.getElementById('confirmationModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('confirmationModal').style.display = "none";
        }

        function submitForm() {
            closeModal();
            alert("Attendance Updated");
            document.querySelector('form').submit();
        }
    </script>

</body>

</html>
