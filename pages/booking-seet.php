<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login-page.php");
    exit();
}
include_once('../inc/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    $bus_id = $_POST['bus_id'];
    $date = $_POST['date'];
    $route_id = $_POST['r_id']; 
    $selectedSeats = $_POST['seats'];
    $user_id = $_SESSION['id'];
    $placeholders = implode(',', array_fill(0, count($selectedSeats), '?'));  
    $query = "SELECT * FROM seet_booking WHERE book_date = ? AND bus_id = ? AND route_id = ? AND seet_id IN ($placeholders)";
    $stmt = $conn->prepare($query);
    $types = 'sii' . str_repeat('i', count($selectedSeats));
    $bindParams = array_merge([$types, $date, $bus_id, $route_id], $selectedSeats);
    $stmt->bind_param(...$bindParams);
    $stmt->execute();
    $result = $stmt->get_result();   
    if ($result->num_rows > 0) {
        echo "Some seets are already booked by someone. please book other seats";
    }else {

        foreach ($selectedSeats as $seatId) {
            $insertSql = "INSERT INTO seet_booking (bus_id, route_id, book_date, seet_id, user_id) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("iisii", $bus_id, $route_id, $date, $seatId, $user_id);
            $insertStmt->execute();
        }
        echo "<script>
        alert('Seat(s) booked successfully');
        window.location.href = '../index.php'; // Redirect to a specific page after displaying the alert
      </script>";
    }     
   }
?>