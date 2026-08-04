<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();

// Check if student is logged in
if (!isset($_SESSION['sid']) || !$user->getsession()) {
    header('Location: st_login.php');
    exit();
}

$sid = $_SESSION['sid'];
$sname = $_SESSION['sname'];

// Fetch attendance and marks data
$attendance = $user->get_attendance($sid);
$marks = $user->get_marks($sid);

// Prepare data for charts
$attendanceData = [
    'labels' => ['Present', 'Absent', 'Late'],
    'datasets' => [[
        'label' => 'Attendance',
        'data' => [$attendance['present'], $attendance['absent'], $attendance['late']],
        'backgroundColor' => ['#4CAF50', '#F44336', '#FFC107'],
        'hoverOffset' => 4
    ]]
];

$marksLabels = [];
$marksData = [];
foreach ($marks as $mark) {
    $marksLabels[] = $mark['subject'];
    $marksData[] = $mark['marks'];
}
$marksData = [
    'labels' => $marksLabels,
    'datasets' => [[
        'label' => 'Marks',
        'data' => $marksData,
        'backgroundColor' => ['#2196F3', '#4CAF50', '#FFC107', '#FF5722', '#9C27B0'],
        'hoverOffset' => 4
    ]]
];
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance and Marks</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Attendance and Marks Dashboard</h2>

    <div class="charts">
        <h3>Attendance</h3>
        <canvas id="attendanceChart" width="400" height="200"></canvas>
        
        <h3>Marks</h3>
        <canvas id="marksChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Attendance Data
        const attendanceData = <?php echo json_encode($attendanceData); ?>;

        // Marks Data
        const marksData = <?php echo json_encode($marksData); ?>;

        // Configurations
        const configAttendance = {
            type: 'pie',
            data: attendanceData,
        };

        const configMarks = {
            type: 'bar',
            data: marksData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Render Charts
        const attendanceChart = new Chart(
            document.getElementById('attendanceChart'),
            configAttendance
        );

        const marksChart = new Chart(
            document.getElementById('marksChart'),
            configMarks
        );
    </script>
</body>
</html>