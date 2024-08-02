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
            <div class="list scroll">
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
                <div class="item ">
                    <img src="<?php echo $value->img1?>">
                    <div class="info">
                        <div class="name"><?php echo $value->content?></div>
                        <div class="price"><?php echo $value->newPrice?>$/product</div>
                    </div>
                    <div class="checkout_icon"> 
                        <span class="disable id"><?php echo $value->product_id?></span>
                        <span class="disable value"><?php echo $value->newPrice?></span>
                        <button class="minus"><i class="fa-solid fa-minus"></i></button>
                        <span id="<?php echo $value->product_id?>"><?php echo $value->amount?></span>              
                        <button class="plus" ><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="<?php echo $value->product_id?>price"><?php echo $value->amount*$value->newPrice?>$</div>
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
<script>
    $(document).ready(function(){
        
            $('.plus').click(function(e){
                e.preventDefault();
                var value = $(this).closest('.item').find('.value').text();
                var user_id = $(this).closest('.item').find('.id').text();
                $.ajax({
                    method: "POST",
                    url: "http://localhost/examfinal/product/plusProduct",
                    data: {
                        'plus': true,
                        'id':user_id,
                    },
                    dataType: "",
                    success: function (response){
                        load_total_price();
                        load_total_quantity();
                        load_price_on_id(user_id,value);
                        load_quantity(user_id);
                        
                    }   
                })
            });
        });

        $(document).ready(function(){
            $('.minus').click(function(e){
                e.preventDefault();
                var value = $(this).closest('.item').find('.value').text();
                var user_id = $(this).closest('.item').find('.id').text();
                $.ajax({
                    method: "POST",
                    url: "http://localhost/examfinal/product/minusProduct",
                    data: {
                        'minus': true,
                        'id':user_id,
                    },
                    dataType: "",
                    success: function (response){
                        load_total_price();
                        load_total_quantity();
                        load_price_on_id(user_id,value);
                        load_quantity(user_id);
                        
                    }   
                })
            });
        });
        
        function load_quantity(user_id) {
            
            let text = "#".concat(user_id)
            console.log(text);
            $.ajax({
                url: 'http://localhost/examfinal/product/load_cart_item_number',
                method: 'get',
                data: {
                    quantity: "quantity",
                    'id': user_id
                },
                success: function(response) {
                if(response==0){
                    
                    
                        location.reload();
                    
                } else {

                    $(text).html(response);
                }
                }
            });
            }
            
            function load_price_on_id(user_id,value) {
            
            let text = ".".concat(user_id,"price");
            console.log(text);
            $.ajax({
                url: 'http://localhost/examfinal/product/load_cart_item_number',
                method: 'get',
                data: {
                    price: "price",
                    'id': user_id,
                    'value': value
                },
                success: function(response) {
                
                $(text).html(response.concat("$"));
                }
            });
            }

            function load_total_quantity() {
            
            $.ajax({
                url: 'http://localhost/examfinal/product/load_cart_item_number',
                method: 'get',
                data: {
                    totalQuantity: "totalQuantity"
                    
                    
                },
                success: function(response) {
                
                $(".totalQuantity").html(response);
                }
            });
            }

            function load_total_price() {
            
            $.ajax({
                url: 'http://localhost/examfinal/product/load_cart_item_number',
                method: 'get',
                data: {
                    totalPrice: "totalPrice"
                    
                    
                },
                success: function(response) {
                
                $(".totalPrice").html("$".concat(response));
                }
            });
            }

            function delete_item() {
            
            $.ajax({
                url: 'http://localhost/examfinal/product/load_cart_item_number',
                method: 'get',
                data: {
                    deleteItem: "deleteItem"
                    
                    
                },
                success: function(response) {
                
                
                }
            });
            }

</script>
</html>