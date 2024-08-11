<!DOCTYPE html>
<html lang="en">
<head>
                <?php 
                if(isset($_SERVER["PATH_INFO"])){
                    $handleUrl = explode("/",$_SERVER["PATH_INFO"]);
                    $content = $handleUrl[1];
                }
                ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/header.css">
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/bestSelling.css">
    <link href="http://localhost/examfinal/app/asset/css/<?php echo($data["content"]);?>.css" rel="stylesheet" />
    <title>header</title>
    
</head>
<body>
    <section class="<?php echo $content == "home"?"":"sub-";?>header">
        <nav>
            <a href="http://localhost/examfinal/app/views/layouts/header.php">
                <img src="http://localhost/examfinal/app/asset/img/baker_bite-logo.png">
            </a>
            <div class="nav-links" id="navLinks">
            <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
                <ul>
                <li><a href="http://localhost/examfinal/home/index" style="<?php echo $content=="home"?"color:#EB684A;":""?>">HOME</a></li>
                    <li><a href="http://localhost/examfinal/product/All" style="<?php echo $content=="product"?"color:#EB684A;":""?>">PRODUCTS</a></li>
                    <li><a href="http://localhost/examfinal/gallery/index" style="<?php echo $content=="gallery"?"color:#EB684A;":""?>">GALLERY</a></li>
                    <li><a href="http://localhost/examfinal/about/index" style="<?php echo $content=="about"?"color:#EB684A;":""?>">ABOUT US</a></li>
                    <li><a href="http://localhost/examfinal/contact/index" style="<?php echo $content=="contact"?"color:#EB684A;":""?>">CONTACT US</a></li>
                    <li class="login__layout <?php echo isset($_SESSION["user"])?"":"disable"?>">
                        
                        <?php if(isset($_SESSION["user"])): ?>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="user__model">HELLO  <?=strtoupper($_SESSION["user"]["username"])?></div>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Account</a>
                                <a class="dropdown-item" href="#">Transaction History</a>
                                <a class="dropdown-item" href="http://localhost/examfinal/user/logout">Logout</a>
                            </div>
                    </li>
                    <?php else : ?>
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
                    <?php 
                        
                        if(isset($data["content"])&&$data["content"]=="product"):
                    ?>
                    <li>
                        <a href="http://localhost/examfinal/cart/index"><i class="fa-solid fa-cart-shopping "></i>
                        <span id="cart-item" class="badge badge-danger"></span>
                        </a>
                        
                    </li>

                    <?php else : ?>
                     
                        <span></span>
                    <?php endif; ?>

                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>
                  
        <?php if(isset($content)&&$content=="home"): ?>
        <div class="text-box">
            <h1>Welcome To Bakerz Bite</h1>
            <p>We invite you to visit Bakerz Bite and experience the difference that passion and quality can make.<br> Whether you’re stopping by for a quick coffee and pastry or selecting a cake for a special occasion,<br> we promise you’ll leave with a smile.</p>
            <a href="http://localhost/examfinal/product/All" class="hero-btn">BUY NOW !</a>
        </div>
        <?php elseif(isset($content)&&$content=="product") : ?>
        <div class="text-box">
            <h1 style="color: white;">Product Page</h1>
            <p>Our product page is designed to provide customers with the best online shopping experience.<br> This page includes numerous features and detailed information to help users easily search for and select products that meet their needs.</p>
        </div>
        <?php elseif(isset($content)&&$content=="gallery") : ?>
        <div class="text-box">
            <h1 style="color: white; font-size: 55px;">Gallery</h1>
            <p>Explore our bakery's photo gallery to indulge in the visual delight of artisan breads, pastries, and cakes, crafted with passion and quality.</p>
        </div>
        <?php elseif(isset($content)&&$content=="about") : ?>
        <div class="text-box">
            <h1>About Us</h1>
            <p>Our "About Us" page provides detailed information about the company, its mission, vision, and core values.<br> Here, you can learn about our development history, leadership team, and our commitments to customers and the community.<br> This page is designed to help you understand more about who we are and why we do what we do.</p>
        </div>
        <?php elseif(isset($content)&&$content=="contact") : ?>
        <div class="text-box">
            <h1>Contact Us</h1>
            <p>If you have any questions or need further information, feel free to contact us</p>
        </div>
        <?php endif; ?>
        </div>
    </section>