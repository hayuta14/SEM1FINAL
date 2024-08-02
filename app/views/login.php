<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/login.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Login</title>
</head>
<body>
    <?php 
        $error;
        if (isset($_REQUEST["error"])) {
            $error = $_REQUEST["error"];
        }
    
    
    ?>
    <body>
        <div class="wrapper">
        <div class="login_icon"><a href="http://localhost/examfinal/home/index"><i class="fa-solid fa-arrow-left"></i></a></div>
        <h1 class="login_text">Login</h1>
        <p id="error-message"></p>
        <form id="form" action="http://localhost/examfinal/user/login" method="POST">
            <div>    
                <label for="username">
                <i class="fa-solid fa-user"></i>
                </label>                          
                <input type="text" name="username" id="username" placeholder="user name">                                                     
             </div>
            <div>  
                <label for="password-input">
                <i class="fa-solid fa-lock"></i>
                </label>                            
                <input type="text" name="password" id="password-input" placeholder="Password">                                                     
            </div>

            <div>

                <span style="color: red;"><?php echo isset($error) && $error == "true" ? "username or password is not correct" : "" ?></span>
            </div>
            
            <div>
                <button type="submit" value="sign in">Login</button>
             </div>
        </form>
        <!-- <p>New here? <a href="signup.html">Create an Account? </a> </p> -->
    </div>
</body>
</body>
</html>