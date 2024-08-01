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
        <div class="tab__btns">
        <?php $listCategory = $data["listCategory"]; ?>
        <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == "All"? "active-tab":""; ?>" href="http://localhost/examfinal/product/All" >All</a>
        <?php foreach ($listCategory as $key => $value) : ?>
            <a class="tab__btn <?php echo isset($_SERVER["PATH_INFO"]) && $name == $value->category? "active-tab":""; ?>" href="http://localhost/examfinal/product/<?php echo $value->category?>" ><?php echo ucfirst($value->category)?></a>
    
        <?php endforeach; ?>
        </div>
        <form action="http://localhost/examfinal/product/<?php echo $name?>" id="frm" method="GET">

            <select name="cake" id="cake" onchange="onSelectChange();">
                <option value="content-asc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="content-asc"? "selected" : "";?>>Name: A-Z</option>
                <option value="content-desc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="content-desc"? "selected" : "";?>>Name: Z-A</option>
                <option value="newPrice-asc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="newPrice-asc"? "selected" : "";?>>Price: ASC</option>
                <option value="newPrice-desc" <?php echo isset($_GET["cake"]) && $_GET["cake"]=="newPrice-desc"? "selected" : "";?>>Price: DESC</option>
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

    <!--=======PRODUCTS=========-->
            <?php 
                if(isset($_SERVER["PATH_INFO"])){
                    $handleUrl = explode("/",$_SERVER["PATH_INFO"]);
                    
                    
                    $name = $handleUrl[2];
                    

                }
            ?>
        <!-- Alert Modal -->
        <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title fs-5" id="alertModalLabel"></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="http://localhost/examfinal/user/login" class="btn btn-primary <?php echo isset($_SESSION["user"])?"disable":"";?>">Login</a>
            </div>
            </div>
        </div>
        </div>    

        <!-- Product Modal -->
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
        <div class="tab__items">
            <div class="tab__item active-tab" content id="featured">
                <div class="product__container grid">
                    <!-- /*list product*/ -->
                    <?php $listProduct = $data["listProduct"]; 
                        
                    ?>
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
          $('#alertModal').modal('show');
          $('#alertModalLabel').html(response);

          load_cart_item_number();
          $('#insertData').modal('hide');
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