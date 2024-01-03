<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login-page.php");
    exit();
}
include_once('../inc/connection.php');
if (isset($_GET['bus_id'], $_GET['date'], $_GET['route_id'])) {
    $bus_id = $_GET['bus_id'];
    $date = $_GET['date'];
    $r_id = $_GET['route_id'];
    //echo "<h3 style='color:red;'>" . $date . $bus_id . $r_id . "</h3>";
    $sql = "SELECT * FROM seet_booking WHERE DATE_FORMAT(book_date, '%Y-%m-%d') = ? AND bus_id=? AND route_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $date, $bus_id, $r_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $bookedSeats = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookedSeats[] = $row['seet_id'];
        }
    }
    $abc = "SELECT * FROM seets1 WHERE bus_id = ?";
    $bca = $conn->prepare($abc);
    $bca->bind_param("s", $bus_id);
    $bca->execute();
    $result = $bca->get_result();
    if ($result->num_rows > 0) {
        echo '<form method="post" action="booking-seet.php">';
        echo '<ul class="seatContainer">';
        while ($row = $result->fetch_assoc()) {
            $seatId = $row["id"];
            $seatName = $row['seet_name'];
            $isBooked = (in_array($seatId, $bookedSeats)) ? "disabled" : "";
            $seatClass = ($isBooked === "disabled") ? "seat-item seat-booked" : "seat-item";
            echo "<li class='$seatClass'>
                <label for='seat_$seatId'>" . $seatName ."</label> 
                <input type='checkbox' id='seat_$seatId' name='seats[]' value='$seatId' $isBooked>
                <input type='hidden'  name='r_id' value='$r_id' >             
                </li>";
        }
        echo '</ul>';
        echo '<input type="hidden" name="bus_id" value="' . $bus_id . '">';
        echo '<input type="hidden" name="date" value="' . $date . '">';
        echo '<input type="submit" class="btn-primary" value="Book Selected Seats">';
        echo '</form>';
    } else {
        echo "No seats found for this bus.";
    }
} else {
    echo "Bus ID or date not provided.";
}
?>
