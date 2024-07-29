<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=======CSS=========-->
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/headerAndFooter.css">
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/cart.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="checkoutLayout">

        
        <div class="returnCart">
            <a href="http://localhost/examfinal/product/All">keep shopping</a>
            <h1>List Product in Cart</h1>
            <div class="list">
            <?php 
            $listProduct = $data["listProduct"];
            if(isset($data["quantity"])){
                $quantity = $data["quantity"];

            } else {
                $quantity = 0;
            }

            if(isset($data["quantity"])){
                
                $total_price = $data["total_price"]; 

            } else {
                $total_price = 0;
            }
            ?>
            
            <?php foreach ($listProduct as $key => $value) : ?>
                <div class="item">
                    <img src="<?php echo $value->img1?>">
                    <div class="info">
                        <div class="name"><?php echo $value->content?></div>
                        <div class="price"><?php echo $value->newPrice?></div>
                    </div>
                    <div class="checkout_icon"> 
                        <a href="http://localhost/examfinal/product/minusProduct?id=<?php echo $value->product_id?>"><i class="fa-solid fa-minus"></i></a>
                        <?php echo $value->amount?>                
                        <a href="http://localhost/examfinal/product/plusProduct?id=<?php echo $value->product_id?>"><i class="fa-solid fa-plus"></i></a>
                    </div>
                    <div class="returnPrice"><?php echo $value->amount*$value->newPrice?></div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    <?php 
    if(isset($data["error"])){
        $error=$data["error"];
        $name = $data["name"];
        
    }
    ?>            
    <form action="http://localhost/examfinal/cart/checkout" method="POST">           
        <div class="right">
            <h1>Checkout</h1>

            <div class="form">
                <div class="group">
                    <label class="label_content" for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="<?php echo isset($name[0])?$name[0]:"";?>">
                    <span class="alert_title"><?php echo isset($error[0])? $error[0]:"";?></span>
                </div>
    
                <div class="group">
                    <label class="label_content" for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="<?php echo isset($name[2])?$name[2]:"";?>">
                    <span class="alert_title"><?php echo isset($error[1])? $error[2]:"";?></span>
                </div>
    
                <div class="group">
                    <label class="label_content" for="address">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo isset($name[3])?$name[3]:"";?>">
                    <span class="alert_title"><?php echo isset($error[2])? $error[3]:"";?></span>
                </div>
    
                <div class="group">
                    <label class="label_content" for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo isset($name[1])?$name[1]:"";?>">
                    <span class="alert_title"><?php echo isset($error[3])? $error[1]:"";?></span>
                </div>
    
                <input type="hidden" name="date" id="date" value="<?php echo date("Y-m-d")?>">
                <input type="hidden" name="total_price" id="total_price" value="<?php echo $total_price?>">
                <input type="hidden" name="user_id" id="user_id" value="<?php echo isset($_SESSION["user"])?$_SESSION["user"]["id"]:''?>">
            </div>
            <div class="return">
                <div class="row">
                    <div>Total Quantity</div>
                    <div class="totalQuantity"><?php echo $quantity; ?></div>
                </div>
                <div class="row">
                    <div>Total Price</div>
                    <div class="totalPrice">$<?php echo $total_price;?></div>
                </div>
            </div>
            <button class="buttonCheckout" type="submit">CHECKOUT</button>
            </div>
    </div>
    </form>   
</div>

</body>

</html>