<?php
 include_once('../inc/header.php');
 include_once('../inc/registration.php');
?>

<section class="logInForm">
        <div class="container login-container">
            <h2 class="text-center mb-4" >Create Account</h2>
            <form action='?' method="post" onsubmit="return validationOnRegistration()">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your username" >
                <p id="errorName" style="color:red;"></p>
              </div>
              
              <div class="mb-3">
                <label for="name" class="form-label">Phone</label>
                <input type="tel" class="form-control" name="phone"  id="phone" placeholder="Enter your phone" >
                <p id="errorPhone" style="color:red;"></p>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" >
                <p id="errorEmail" style="color:red;"></p>
              </div>
              <div class="mb-3">
                <label for="password"  class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" >
                <p id="errorPassword" style="color:red;"></p>
              </div>
              <input type="submit" class="btn btn-primary btn-block signbtn login-btn w-100"><hr>
              <h5 class= d-flex justify-content-center">Alreday have an account <a href="../pages/login-page.php">Log In</a></h5>
            </form>
          </div>
     </section>

<?php include_once('../inc/footer.php') ?>