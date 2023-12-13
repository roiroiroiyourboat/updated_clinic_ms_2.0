<!DOCTYPE html>
<html>
    <head>
        <title>BulSU-SC Log in form</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="log_in.css">
    </head>
    <body>
        <div class="container">
            <div class="box">
                <div class="header">
                    <header><img src="BulSU Logo.png" alt="logo">
                        <img src="BulSU-SC Logo.png" alt="logo">      
                    </header>
                    <p>Log In</p>
                </div>

                <form action="login_config.php" method="post">
                <div class="row">
                    <div class="col">
                        <label for="form-label">E-mail address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col">
                        <label for="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                    
                    <div class="input-box">
                        <input type="submit" class="btn" value="Log in">
                    </div>

                    <div class="links">
                        <span>Don't have an account? <br>
                        <a href="register.php">Sign Up</a></span>
                        <span><a href="#">Forgot Password? </a></span>
                  </div>

                </form>

            </div>

             <div class="wrapper"></div>

        </div>
       
    </body>

</html>