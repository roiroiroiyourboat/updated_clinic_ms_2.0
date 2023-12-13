<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <div class="container">
            <div class="box">
                <div class="header">
                    <header><img src="BulSU Logo.png" alt="logo">
                        <img src="BulSU-SC Logo.png" alt="logo">
                    </header>
                    <p>Sign Up</p>
                </div>

                <form action="config.php" method="post">
                    <div class="row">
                        <div class = "col">
                            <label for="form-label">First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" autocomplete="off" required> 
                        </div>

                        <div class = "col">
                            <label for="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="lname" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="form-label">E-mail address:</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="for-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <input type="submit" class="btn" name="signup"value="Sign Up">
                    </div>

                    <div class="links">
                        <span>Already have an account?
                        <a href="log_in.php">Log in</a></span>
                  </div>

                </form>

            </div>
                
             <div class="wrapper"></div>

        </div>
       
    </body>

</html>