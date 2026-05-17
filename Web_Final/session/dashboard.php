<?php
session_start();

$timeout = 30; // 30 seconds

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Session timeout check
if (time() - $_SESSION['start_time'] > $timeout) {
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>

    <p>Welcome, <?php echo $user; ?>!</p>

    <a href="logout.php">Logout</a>
</body>
</html>