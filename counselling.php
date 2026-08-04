<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();

// Check if counselor is logged in
if (!isset($_SESSION['counselor_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch student statistics with error handling
$total_students = $user->get_total_students() ?? 0;
$active_students = $user->get_active_students() ?? 0;
$graduated_students = $user->get_graduated_students() ?? 0;

// Fetch student list with error handling
$students = $user->get_all_students() ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counseling Dashboard</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h2>Counseling Dashboard</h2>

    <!-- Student Statistics -->
    <div class="stats">
        <h3>Student Statistics</h3>
        <p>Total Students: <?php echo htmlspecialchars($total_students); ?></p>
        <p>Active Students: <?php echo htmlspecialchars($active_students); ?></p>
        <p>Graduated Students: <?php echo htmlspecialchars($graduated_students); ?></p>
    </div>

    <!-- Student List -->
    <h3>Student List</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Course</th>
            <th>Profile</th>
        </tr>
        <?php foreach ($students as $student) { ?>
        <tr>
            <td><?php echo htmlspecialchars($student['id']); ?></td>
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo htmlspecialchars($student['dob']); ?></td>
            <td><?php echo htmlspecialchars($student['course']); ?></td>
            <td><a href="student_profile.php?id=<?php echo htmlspecialchars($student['id']); ?>">View</a></td>
        </tr>
        <?php } ?>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>