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
    <section class="products section container">
        <div class="tab__btns">
            <span class="tab__btn active-tab" data-target="#featured">Featured</span>
            <span class="tab__btn" data-target="#popular">Popular</span>
            <span class="tab__btn" data-target="#new-added">New added</span>
        </div>

        <div class="tab__items">
            <div class="tab__item active-tab" content id="featured">
                <div class="product__container grid">
                    <!-- /*list product*/ -->
                    <?php $listProduct = $data["listProduct"]; ?>
                    <?php foreach ($listProduct as $key => $value) : ?>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="<?php echo $value->img1?>" class="product__img default" alt="">
                                <img src="<?php echo $value->img2?>" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

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

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                     <!-- <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/DoubleChocResize.b1b4aebf.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/LemonCakeResize.f485fbe3.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                                
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/HoneyCakeResize.0aae142d.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/PistachioResize.0d856fac.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                                
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/RedVelvetCCResize.295d1232.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/VanillaIcingCCResize.70dbd02d.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/DoubleChocResize.b1b4aebf.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/LemonCakeResize.f485fbe3.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/HoneyCakeResize.0aae142d.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/PistachioResize.0d856fac.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/RedVelvetCCResize.295d1232.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/VanillaIcingCCResize.70dbd02d.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>  -->
                </div>
            </div>
            <div class="tab__item" content id="popular">
                <div class="product__container grid">
                    <!-- /*list product*/ -->
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/BlackCupcake.038afa5b.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/DoubleChocResize.b1b4aebf.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/HoneyCakeResize.0aae142d.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/WalnutCake.d44a1984.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab__item" content id="new-added">
                <div class="product__container grid">
                    <!-- /*list product*/ -->
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/BlackCupcake.038afa5b.png" class="product__img default" alt="">
                                
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/DoubleChocResize.b1b4aebf.png" class="product__img default" alt="">
                                
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/HoneyCakeResize.0aae142d.png" class="product__img default" alt="">
                                
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
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
    <!--=============== NEW ARRIVALS ===============-->
    <!-- <section class="new__arrivals container section">  
    <h3 class="section__title"><span>NEW</span> ARRIVALS</h3>

    <div class="new__container swiper">
    <div class="swiper-wrapper">
                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/DoubleChocResize.b1b4aebf.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/LemonCakeResize.f485fbe3.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/HoneyCakeResize.0aae142d.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/PistachioResize.0d856fac.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/RedVelvetCCResize.295d1232.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/VanillaIcingCCResize.70dbd02d.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/DoubleChocResize.b1b4aebf.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/LemonCakeResize.f485fbe3.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/HoneyCakeResize.0aae142d.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/PistachioResize.0d856fac.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__image">
                                <img src="https://bakerz-bite.vercel.app/assets/RedVelvetCCResize.295d1232.png" class="product__img default" alt="">
                                <img src="https://bakerz-bite.vercel.app/assets/VanillaIcingCCResize.70dbd02d.png" class="product__img hover" alt="">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Add To Wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <a href="" class="action__btn" aria-label="Compare">
                                    <i class="fa-solid fa-shuffle"></i>
                                </a>
                            </div>

                            <div class="product__badge light-pink">Hot</div>
                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">Colorful Pattern Shirts</h3>
                            </a>
                            <div class="product__rating">
                               
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$232.85</span>
                            </div>

                            <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
    </div>

    <div class="swiper-button-next">
        <i class="fa-solid fa-angle-right"></i>
    </div>
    
    <div class="swiper-button-prev">
        <i class="fa-solid fa-angle-left"></i>
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
    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--=======JS=========-->
    
    <script src="http://localhost/examfinal/app/asset/js/product.js"></script>
</body>
</html>