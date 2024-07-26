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
            <?php $listProduct = $data["listProduct"]; ?>
            
            <?php foreach ($listProduct as $key => $value) : ?>
                <div class="item">
                    <img src="<?php echo $value->img?>">
                    <div class="info">
                        <div class="name"><?php echo $value->content?></div>
                        <div class="price"><?php echo $value->price?></div>
                    </div>
                    <div class="checkout_icon"> 
                        <a href="http://localhost/examfinal/product/minusProduct?id=<?php echo $value->id?>"><i class="fa-solid fa-minus"></i></a>
                        <?php echo $value->amount?>                
                        <a href="http://localhost/examfinal/product/plusProduct?id=<?php echo $value->id?>"><i class="fa-solid fa-plus"></i></a>
                    </div>
                    <div class="returnPrice"><?php echo $value->total_price?></div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>


        <div class="right">
            <h1>Checkout</h1>

            <div class="form">
                <div class="group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name">
                </div>
    
                <div class="group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone">
                </div>
    
                <div class="group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address">
                </div>
    
                <div class="group">
                    <label for="country">Country</label>
                    <select name="country" id="country">
                        <option value="">Choose..</option>
                        <option value="">Kingdom</option>
                    </select>
                </div>
    
                <div class="group">
                    <label for="city">City</label>
                    <select name="city" id="city">
                        <option value="">Choose..</option>
                        <option value="">London</option>
                    </select>
                </div>
            </div>
            <div class="return">
                <div class="row">
                    <div>Total Quantity</div>
                    <div class="totalQuantity">70</div>
                </div>
                <div class="row">
                    <div>Total Price</div>
                    <div class="totalPrice">$900</div>
                </div>
            </div>
            <button class="buttonCheckout">CHECKOUT</button>
            </div>
    </div>
</div>

</body>
</html>