<?php
 include_once('../inc/header.php');
 include_once('../inc/login.php');
 ?>

<section class="logInForm">
        <div class="container login-container">
             <h2 class="text-center mb-4">Bus Reservation Login</h2>
                <form action="?" method="post">
              
                <?php echo $error ?>
              
            
                <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username"
                        placeholder="Enter your username">
                    <p class="error" id="usernameError"></p>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter your password">
                    <p class="error" id="passwordError"></p>
                </div>
                <input type="submit" value="Log In" class="btn btn-primary btn-block signbtn login-btn w-100">
            </form>
            <hr>
            <h5 class= d-flex justify-content-center">Don't have an account <a href="../pages/registration-page.php">Sign Up</a> </h5>
        </div>
</section>

<?php include_once('../inc/footer.php') ?>