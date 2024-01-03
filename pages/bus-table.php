<?php
 include_once('../inc/header.php');
 include_once('../inc/navbar.php');
?>
<section class="py-5 routes">
    <div class="container">
      <h2 class="text-center">Bus Routes</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr  class="">
              <th>Bus Number</th> 
               <th>Departure Time</th>
              <th>From</th>
              <th>To</th>
              <th>bus type</th>
              <th>Available Seats</th>
              <th>Ticket Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php 
           include_once('../inc/buses.php');
           ?>   
          </tbody>
        </table>
      </div>
    </div>
  </section> 