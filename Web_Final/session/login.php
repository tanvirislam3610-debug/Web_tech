<?php
session_start();


$stored_username = "admin";
$stored_password = password_hash("1234", PASSWORD_DEFAULT);
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $stored_username && password_verify($password, $stored_password)) {

        $_SESSION['user'] = $username;
        $_SESSION['start_time'] = time();

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

<p style="color:red;"><?php echo $error; ?></p>

</body>
</html>