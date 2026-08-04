<?php
session_start();

// Include necessary files (replace with your actual paths)
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();

// Check if faculty is logged in
if (!$user->get_faculty_session()) {
    header('Location: faculty_login.php'); // Your faculty login page
    exit();
}

$faculty_id = $_SESSION['funame']; // Get the faculty's ID

// Database connection (replace with your credentials)
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "uni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle assignment
if (isset($_POST['assign_student'])) {
    $student_id = $_POST['student_id'];
    $student_id = mysqli_real_escape_string($conn, $student_id); // Sanitize!

    $update_sql = "UPDATE at_student SET assigned_counselor = '$uname' WHERE st_id = '$student_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Student assigned successfully.'); window.location.href = window.location.href;</script>";
    } else {
        echo "Error assigning student: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Counselor Page</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Student Counselor Page</h1>

<table id="studentTable">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Program</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT s.st_id, s.name, i.program, a.assigned_counselor
                FROM at_student AS s
                INNER JOIN st_info AS i ON s.st_id = i.st_id
                LEFT JOIN at_student AS a ON s.st_id = a.st_id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["st_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["program"] . "</td>";
                echo "<td>";

                if ($row["assigned_counselor"] == NULL || $row['assigned_counselor'] == "") {
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='student_id' value='" . $row["st_id"] . "'>";
                    echo "<button type='submit' name='assign_student'>Assign to Me</button>";
                    echo "</form>";
                } else {
                    $assigned_id = $row['assigned_counselor'];
                    if ($assigned_id != "") {
                        $faculty_name_sql = "SELECT name FROM faculty WHERE id = '$assigned_id'";
                        $faculty_result = $conn->query($faculty_name_sql);
                        if ($faculty_result && $faculty_result->num_rows > 0) {
                            $faculty_row = $faculty_result->fetch_assoc();
                            echo "Assigned to: " . $faculty_row['name'];
                        } else {
                            echo "Assigned";
                        }
                    }
                }

                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No students found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php $conn->close(); ?>