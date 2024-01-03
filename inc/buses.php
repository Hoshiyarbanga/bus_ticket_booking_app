<?php
   session_start(); 
   if(isset($_SESSION['email'])) {  
   }else {
    header("Location:login-page.php");
   }
include_once('../inc/connection.php');
if(isset($_POST)){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
  //  $_SESSION['date'] = $_POST['date'];
  //  echo "<h3 style='color:red;'>". $_SESSION['date'] . "</h3>";
    $sql = "SELECT * FROM `routes` WHERE `from` = ? AND `to` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $route_id = $row['route_id'];
        $sql3 = "SELECT * FROM bus_routes JOIN buses ON buses.id = bus_routes.bus_id WHERE route_id = ?";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bind_param("i", $route_id);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        if($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
              echo  $rb = '<tr>
                        <th>' . $row3['bus_number'] . '</th>
                        <th>' . $row3['departure_time'] . '</th>
                        <th>' . $from . '</th>
                        <th>' . $to . '</th>
                        <th>' . $row3['type'] . '</th>
                        <th>' . $row3['available_seats'] . '</th>
                        <th>' . $row3['ticket_price'] . '</th>
                        <th><a href="seet-table.php?bus_id='. $row3['bus_id'].'&&date='. $date .'&&route_id='.$route_id.'">book seat</a></th>
                    </tr>';
         
            }
        } else {
            echo "No bus routes found for this route ID.";
        }
    } else {
        echo "No route found for the specified 'from' and 'to'.";
    }
} else {
    echo "Please provide 'from' and 'to' values.";
}
?>
