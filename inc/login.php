<?php

include_once('../inc/connection.php'); 
error_reporting(E_ERROR | E_PARSE);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password_from_db = $row['password'];

        if (password_verify($password, $hashed_password_from_db)) {
            session_start(); 
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
            header("location:../index.php"); 
        } else {
            $error = "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <h3>Password is Incorrect</h3>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    } else {
        $error = "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <h3>User not Found</h3>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
}
?>
