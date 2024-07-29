<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=======FLATICON=========-->
    <link rel="stylesheet" href="">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Products</title>
    <!--=======CSS=========-->
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/headerAndFooter.css">
    <!--=======SWIPER CSS=========-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    
    <link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/product.css">
</head>
<body>
    <section class="sort section container">
        <?php 
        $string = explode("/",$_SERVER["PATH_INFO"]);
        $name = $string[2];
        ?>
        <form action="http://localhost/examfinal/product/<?php echo $name?>" id="frm" method="GET">

            <select name="cake" id="cake" onchange="onSelectChange();">
                <option value="content-asc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="content-asc"? "selected" : "";?>>Ten: A-Z</option>
                <option value="content-desc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="content-desc"? "selected" : "";?>>Ten: Z-A</option>
                <option value="newPrice-asc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="newPrice-asc"? "selected" : "";?>>Gia: tang dan</option>
                <option value="newPrice-desc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="newPrice-desc"? "selected" : "";?>>Gia: giam dan</option>
                <option value="status-newest" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="status-newest"? "selected" : "";?>>Newest</option>
                <option value="status-oldest" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="status-oldest"? "selected" : "";?>>Oldest</option>
                <!-- <option value="mostSell" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="mostSell"? "selected" : "";?>>Ban chay</option> -->
            </select>
            <script>function onSelectChange(){
            document.getElementById('frm').submit();
                }           
            </script>
        </form>
                
    </section>
    <!--=======Header=========-->
    <!--=======HOME=========-->
    <!--=============== CATEGORIES ===============-->
    <!-- <section class="categories container section">
        <h3 class="section__title">Choose Your Category</h3>

    <div class="categories__container swiper">
        <div class="swiper-wrapper">
            <a href="" class="category__item swiper-slide">
                <img src="https://bakerybitz.com/cdn/shop/files/438C64B7-3202-4C35-999A-81B3B93F1D55.jpg?v=1691524552&width=360" alt=""  class="category__img">

                <h3 class="category__title">CAKE</h3>
            </a>
            <a href="" class="category__item swiper-slide">
                <img src="https://bakerybitz.com/cdn/shop/files/438C64B7-3202-4C35-999A-81B3B93F1D55.jpg?v=1691524552&width=360" alt=""  class="category__img">

                <h3 class="category__title">PASTRIES</h3>
            </a>
            <a href="" class="category__item swiper-slide">
                <img src="https://bakerybitz.com/cdn/shop/files/438C64B7-3202-4C35-999A-81B3B93F1D55.jpg?v=1691524552&width=360" alt=""  class="category__img">

                <h3 class="category__title">COOKIES</h3>
            </a>
            <a href="" class="category__item swiper-slide">
                <img src="https://bakerybitz.com/cdn/shop/files/438C64B7-3202-4C35-999A-81B3B93F1D55.jpg?v=1691524552&width=360" alt=""  class="category__img">

                <h3 class="category__title">DRINKS</h3>
            </a>
            <a href="" class="category__item swiper-slide">
              <img src="https://bakerybitz.com/cdn/shop/files/438C64B7-3202-4C35-999A-81B3B93F1D55.jpg?v=1691524552&width=360" alt=""  class="category__img">

              <h3 class="category__title">BÁNH MỲ KẸP THỊT</h3>
          </a>
          <a href="" class="category__item swiper-slide">
            <img src="https://bakerybitz.com/cdn/shop/files/438C64B7-3202-4C35-999A-81B3B93F1D55.jpg?v=1691524552&width=360" alt=""  class="category__img">

            <h3 class="category__title">DONUT</h3>
        </a>
        <a href="" class="category__item swiper-slide">
          <img src="https://bakerybitz.com/cdn/shop/files/438C64B7-3202-4C35-999A-81B3B93F1D55.jpg?v=1691524552&width=360p" alt=""  class="category__img">

          <h3 class="category__title">BAG</h3>
      </a>

        
        </div>

        <div class="swiper-button-next">
            <i class="fa-solid fa-angle-right"></i>
        </div>
        
        <div class="swiper-button-prev">
            <i class="fa-solid fa-angle-left"></i>
        </div>
        
    </div>
    </section> -->
    <!--=======PRODUCTS=========-->
            <?php 
                if(isset($_SERVER["PATH_INFO"])){
                    $handleUrl = explode("/",$_SERVER["PATH_INFO"]);
                    
                    
                    $name = $handleUrl[2];
                    

                }
            ?>
        <!-- Modal -->
        <div class="modal fade " id="insertData" tabindex="-1" aria-labelledby="insertDataLabel" aria-hidden="true">
        <div class="modal-dialog fixed-top">
            <div class="modal-content">
            
               
            <div class="view_user_data">
                


                
            </div>
            <div class="modal-footer">
                    <button  class="btn btn-secondary" >View detail</button>
                    <form action="" class="form-submit">
                            <input type="hidden" class="pqty" value=1>
                            <input type="hidden" class="pid" value="">
                    <button  class="btn btn-primary addItemBtn" data-dismiss="modal">Add to cart</button>
                                
                    </form>   
            </div>
            
        </div>
        </div>
        </div>
    <section class="products section container">
        <div class="tab__btns">
            <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == "All"? "active-tab":""; ?>" href="http://localhost/examfinal/product/All" >All</a>
            <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == "cake"? "active-tab":""; ?>" href="http://localhost/examfinal/product/cake" >Cakes</a>
            <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == "pastries"? "active-tab":""; ?>" href="http://localhost/examfinal/product/pastries" >Pastries</a>
            <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == "cookies"? "active-tab":""; ?>" href="http://localhost/examfinal/product/cookies" >Cookies</a>
            <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == "pies"? "active-tab":""; ?>" href="http://localhost/examfinal/product/pies" >Pies</a>
            <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == "merchandise"? "active-tab":""; ?>" href="http://localhost/examfinal/product/merchandise" >Merchandise</a>

        </div>
        <div class="tab__items">
            <div class="tab__item active-tab" content id="featured">
                <div class="product__container grid">
                    <!-- /*list product*/ -->
                    <?php $listProduct = $data["listProduct"]; ?>
                    <?php foreach ($listProduct as $key => $value) : ?>
                        <div class="product__item">
                            <div class="product__banner">
                                <span class="disable user_id"><?php echo $value->id?></span>
                                <button type="button" class="product__image view-data" data-bs-toggle="modal" data-bs-target="#insertData">
                                    
                                    <img src="<?php echo $value->img1?>" class="product__img default" alt="">
                                    <img src="<?php echo $value->img2?>" class="product__img hover" alt="">
                                </button>

                            

                            <div class="product__badge light-pink"><?php echo $value->status?></div>
                        </div>

                        <div class="product__content">
                            <span class="product__category"><?php echo $value->category?></span>
                            <a href="">
                                <h3 class="product__title"><?php echo $value->content?></h3>
                            </a>
                            <div class="product__rating">
                            
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$<?php echo $value->newPrice?></span>
                                <span class="old__price">$<?php echo $value->oldPrice?></span>
                            </div>
                        <form action="" class="form-submit">
                            <input type="hidden" class="pqty" value=1>
                            <input type="hidden" class="pid" value="<?= $value->id ?>">
                            <input type="hidden" class="pname" value="<?= $value->content?>">
                            <input type="hidden" class="pprice" value="<?= $value->newPrice ?>">
                            <input type="hidden" class="pimage" value="<?= $value->img1 ?>">
                            <input type="hidden" class="pcategory" value="<?= $value->category?>">
                            <button  class="action__btn cart__btn addItemBtn"><i class="fa-solid fa-cart-shopping "></i></button>
                        </form>    
                        </div>
                    </div>

                    <?php endforeach; ?>
                    
                </div>
            </div>
            
            <?php if(isset($_GET["page"])){
                $page=$_GET["page"];
            } else {
                $page = 1;
            }?>
            <div class="table__pagination">
                <div class="table__pagination-content">Showing <?php echo isset($page)&&$data["numberOfPage"]!=0?$page:"0" ;?> of <?php echo isset($data["numberOfPage"])?$data["numberOfPage"]:"1";?> page</div>
                <div class="table__pagination-icon">
                    <a class="pagination__icon" href="?page=<?php echo $page-1;?>"><i class="fa-solid fa-backward <?php echo $page==1? "disable":""?> "></i></a>
                    <?php for($x=1;$x<=$data["numberOfPage"];$x++) :?>
                        <<?php echo isset($page)&&$page==$x? "span" : "a"?> class="pagination_content <?php echo isset($page)&&$page==$x? "active" : ""?>" href="<?php echo isset($_GET["cake"])?  "?cake=".$_GET["cake"] : ""?><?php echo isset($_GET["cake"])? "&": "?"?>page=<?php echo $x?>"><?php echo $x?></<?php echo isset($page)&&$page==$x? "span" : "a"?>>
                        <?php endfor;?>
                        <a  class="pagination__icon text-decoration-none " href="?page=<?php echo $page+1;?>"><i class="fa-solid fa-forward <?php echo $page==$data["numberOfPage"]||$data["numberOfPage"]==0? "disable":""?>"></i></a>
                    </div>
                </div>
            </div>
        </section>

    <!--=======DEAL=========-->
    <!-- <section class="deals section">
        <div class="deals__container container grid">
            <div class="deals__item">
                <div class="deals__group">
                    <h3 class="deals__brand">Deal of the day</h3>
                    <span class="deals__category">Limited</span>
                </div>

                <h4 class="deals__title">Best cake of the day</h4>

                <div class="deals__price flex">
                    <span class="new__price">$149</span>
                    <span class="old__price">$200</span>
                </div>

                <div class="deals__group">
                    <p class="deals__countdown-text">Hurry Up! Offer End In:</p>
                    <div class="countdown">
                        <div class="countdown__amount">
                            <p class="countdown__period" id="days">0</p>
                            <span class="unit">Days</span>
                        </div>
                        <div class="countdown__amount">
                            <p class="countdown__period" id="hours">0</p>
                            <span class="unit">Hours</span>
                        </div>
                        <div class="countdown__amount">
                            <p class="countdown__period" id="mins">0</p>
                            <span class="unit">Mins</span>
                        </div>
                        <div class="countdown__amount-last">
                            <p class="countdown__period" id="sec">0</p>
                            <span class="unit">Sec</span>
                        </div>
                    </div>
                </div>

                <div class="deals__btn">
                    <a href="" class="btn btn--md">Shop Now</a>
                </div>
            </div>

            <div class="deals__item">
                <div class="deals__group">
                    <h3 class="deals__brand">Deal of the day</h3>
                    <span class="deals__category">Limited</span>
                </div>

                <h4 class="deals__title">Best cake of the day</h4>

                <div class="deals__price flex">
                    <span class="new__price">$149</span>
                    <span class="old__price">$200</span>
                </div>

                <div class="deals__group">
                    <p class="deals__countdown-text">Hurry Up! Offer End In:</p>
                    <div class="countdown">
                        <div class="countdown__amount">
                            <p class="countdown__period" id="days1">0</p>
                            <span class="unit">Days</span>
                        </div>
                        <div class="countdown__amount">
                            <p class="countdown__period" id="hours1">0</p>
                            <span class="unit">Hours</span>
                        </div>
                        <div class="countdown__amount">
                            <p class="countdown__period" id="mins1">0</p>
                            <span class="unit">Mins</span>
                        </div>
                        <div class="countdown__amount-last">
                            <p class="countdown__period" id="sec1">0</p>
                            <span class="unit">Sec</span>
                        </div>
                    </div>
                </div>

                <div class="deals__btn">
                    <a href="" class="btn btn--md">Shop Now</a>
                </div>
            </div>
        </div>
    </section> -->
   
    <!--=======SHOWCASE=========-->
    <!-- <section class="showcase section">
        <div class="showcase__container container grid">
            <div class="showcase__wrapper">
                <h3 class="section__title">Hot release</h3>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="showcase__wrapper">
                <h3 class="section__title">Deal</h3>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="showcase__wrapper">
                <h3 class="section__title">Top Selling</h3>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="showcase__wrapper">
                <h3 class="section__title">Trendy</h3>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
                    <div class="showcase__item">
                        <a href="" class="showcase__img-box">
                            <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" alt="" class="showcase__img">
                        </a>
                        <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Cake</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$234</span>
                                <span class="old__price">$237</span>
                            </div>
                        </div>
                    </div>
            </div>
        </div> -->
    </section>
    <script>
        const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
    </script>
    <script>
        $(document).ready(function(){
            $('.view-data').click(function(e){
                e.preventDefault();

                var user_id = $(this).closest('.product__item').find('.user_id').text();
                $.ajax({
                    method: "POST",
                    url: "http://localhost/examfinal/product/addToCart",
                    data: {
                        'click_view_btn': true,
                        'user_id':user_id,
                    },
                    dataType: "",
                    success: function (response){
                        $('.view_user_data').html(response);
                    }   
                })
            });
        });


        $(document).ready(function(){
            $('.view-data').click(function(e){
                e.preventDefault();

                var user_id = $(this).closest('.product__item').find('.user_id').text();
                $.ajax({
                    method: "POST",
                    url: "http://localhost/examfinal/product/addToCart",
                    data: {
                        'click_view_id_btn': true,
                        'user_id':user_id,
                    },
                    dataType: "",
                    success: function (response){
                        $('.pid').val(response);
                        
                    }   
                })
            });
        });

    </script>
    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--=======JS=========-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="http://localhost/examfinal/app/asset/js/product.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcategory = $form.find(".pcategory").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'http://localhost/examfinal/product/addToCart',
        method: 'post',
        data: {
        'cartItem': true,
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcategory: pcategory
        },
        success: function(response) {
          alert(response);
          
          load_cart_item_number();
          $('#insertData').modal('hide')
        }
      });
    });
    
    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'http://localhost/examfinal/product/load_cart_item_number',
        method: 'get',
        data: {
            cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });

    
  </script>


</body>
</html>