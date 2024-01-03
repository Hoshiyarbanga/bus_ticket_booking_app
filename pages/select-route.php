<?php
 include_once('../inc/header.php');
 include_once('../inc/navbar.php');
 ?>

<div class="container reservation-container">
    <div class="row">
      <div class="col-lg-12 destination">
        <form id="reservationForm" action="../pages/bus-table.php" onsubmit="return abc()" method="post" >
          <div class="mb-3">
          <p id="errorRoute" style="color:red;"></p>
            <label for="from" class="form-label">From</label>
            <select name="from" class="login-select" id="startLocation">
              <option value="" disabled selected>Select starting point</option>
              <?php
                   session_start(); 
                   if(!isset($_SESSION['email'])) { 
                     header("Location:./login-page.php");
                   }
                 include_once('../inc/connection.php');
                 $sql = "SELECT *FROM routes";
                 $result = $conn->query($sql);
                 foreach($result as $row ) {
                ?>
              <option><?php echo $row['from']; ?></option>           
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="to" class="form-label">To</label>
            <select name="to" class="login-select" id="endLocation">
              <option value="" disabled selected>Select destination</option>
              <?php  foreach($result as $row ) {
                ?>
              <option><?php echo $row['to'] ?></option>
            <?php }  ?>
            </select>
          </div>
          <p id="validationResult" style="color:red;"></p>
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" id="date">
          </div>
          <p id="error22"></p>
           <input type="submit" value="Submit" style="width:100%" class="btn btn-primary btn-block">
        </form>
      </div>
    </div>
    </div>
    <?php include_once('../inc/footer.php'); ?>