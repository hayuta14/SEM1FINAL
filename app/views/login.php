<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/login.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <?php 
        $error;
        if (isset($_REQUEST["error"])) {
            $error = $_REQUEST["error"];
        }
    
    
    ?>
    <!-- modal layout  -->
    <div class="modal"> 
            <div class="modal_overlay"></div>
            <div class="modal_body">
    <!-- Login form  -->
                  <div class="auth-form">
                    <div class="auth-form__contain">
                        <div class="auth-form__header">
                            
                            <span class="auth-form__switch">Login</span>
                        </div>
                    <form action="http://localhost/examfinal/user/login" method="POST">
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" name="username" placeholder="Username">
                            </div>
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" name="password" placeholder="Password">
                            </div>
                            <div class="auth-form__under">
                                <span style="color: red;"><?php echo isset($error) && $error == "true" ? "username or password is not correct" : "" ?></span>
                                <input type="submit" value="sign in">
                            </div>
                        </div>

                    </form>
                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="" class="auth-form-link auth-form__help-forgot">Forgot password</a>
                                <span class="auth-form__help-sepa"></span>
                                <a href="" class="auth-form-link">Need help</a>
                            </div>
                        </div>
                        <div class="auth-form__control">
                            <button class="btn auth-form__control-back btn--normal">Return</button>
                            <button class="btn btn--primary">Sign up</button>
                        </div>
                    </div>
                    <div class="auth-form__social">
                        <a href="" class="btn auth-form__social--face btn--size-s btn--width-icon">
                            <i class="auth-form__social-icon fa-brands fa-square-facebook"></i>
                            <span class="auth-form__social-title">
                                Connect Facebook
                            </span>
                        </a>
                        <a href="" class="btn auth-form__social--gg btn--size-s btn--width-icon">
                            <i class="auth-form__social-icon-gg fa-brands fa-google"></i>
                            <span class="auth-form__social-title">
                                Connect Google
                            </span>
                        </a>
                    </div>
                </div>
            </div>
    </div> 
</body>
</html>