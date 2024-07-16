
<section class="header">
        <nav>
            <a href="http://localhost/baker_bite/app/views/layouts/header.php">
                <img src="http://localhost/examfinal/app/asset/img/baker_bite-logo.png">
            </a>
            <div class="nav-links" id="navLinks">
                
            <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="http://localhost/examfinal/home/index">HOME</a></li>
                    <li><a href="http://localhost/examfinal/product/index">PRODUCTS</a></li>
                    <li><a href="">GALLERY</a></li>
                    <li><a href="">ABOUT US</a></li>
                    <li><a href="">CONTACT US</a></li>
                    <li class="login__layout">
                        
                        <?php if(isset($_SESSION["user"])): ?>
                        <div class="user__model">Hello <?=$_SESSION["user"]["username"]?></div>
                        
                    </li>
                    <li>
                        <a href="http://localhost/examfinal/user/logout">Logout</a>
                        <?php else : ?>
                            
                        </li>
                    <li>
                        <a href="http://localhost/examfinal/user/login">LOGIN</a>
                        <?php endif; ?>

                    </li>
                    <?php 
                        if(isset($_SESSION["user"])&&$_SESSION["user"]["role"]=="admin"):
                    ?>
                    <li><a href="http://localhost/examfinal/admin/index">ADMIN PAGE</a></li>
                    <?php else : ?>
                     
                        <span></span>
                    <?php endif; ?>
                </ul>
                
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>

        <div class="text-box">
            <h1 class="nav__content">Welcome To Bakerz Bite</h1>
            <p>Where smiles are served daily.</p>
            <a href="http://localhost/examfinal/product/index" class="hero-btn">BUY NOW !</a>
        </div>
        
    </section>
