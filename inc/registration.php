<?php
include_once('../inc/connection.php');
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = ucfirst($_POST['name']); // Capitalize the first letter of the name
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO `users`(`id`, `name`, `phone`, `email`, `password`) VALUES (NULL, ?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $phone, $email, $hashed_password);
    $stmt->execute();
    $stmt->close();

    header("location:../pages/login-page.php"); 
    exit(); 
}
?>
