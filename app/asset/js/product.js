/*=============== SWIPER CATEGORIES ===============*/
var swiperCategories = new Swiper (".categories__container", {
    spaceBetween: 24,
    loop:true,
    
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
      },
  
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1400: {
          slidesPerView: 6,
          spaceBetween: 24,
        },
      },
    });
    /*=============== SWIPER PRODUCTS ===============*/
var swiperProducts = new Swiper (".new__container", {
    spaceBetween: 24,
    loop:true,
    
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
      },
  
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1400: {
          slidesPerView: 4,
          spaceBetween: 24,
        },
      },
    });
/*===================PRODUCT TABS===========*/
const tabs = document.querySelectorAll('[data-target]');

tabContents = document.querySelectorAll('[content]');
    tabs.forEach((tab) =>{
        tab.addEventListener('click', () => {
            
            const target = document.querySelector(tab.dataset.target);
            tabContents.forEach((tabContent) =>{
                tabContent.classList.remove('active-tab')
                
            });

            target.classList.add('active-tab');

            tabs.forEach((tab) =>{
                tab.classList.remove('active-tab')
            });

            tab.classList.add('active-tab');
        })
    })
/*===================COUNTDOWN DEAL 1===========*/

// const countDownDate1 = new Date("Jul 30, 2024 00:00:00").getTime();
// const interval1 = setInterval(()=>{
//     const now1 = new Date().getTime();
//     const duration1 = countDownDate1 - now1;
    
//     if(duration1<0) {
        
//         clearInterval(interval1);
//         updateDuration(0);
//         return;
//     }

//     updateDuration(duration1);
// },1000);

// function updateDuration(duration1) {
//     const days1 =Math.floor(duration1/(1000*60*60*24));
//     const hours1 =Math.floor((duration1%(1000*60*60*24))/(1000*60*60));
//     const minutes1 =Math.floor((duration1%(1000*60*60))/(1000*60));
//     const seconds1 =Math.floor((duration1%(1000*60))/1000);
    
//     document.getElementById("days").innerHTML = days1;
//     document.getElementById("hours").innerHTML = hours1;
//     document.getElementById("mins").innerHTML = minutes1;
//     document.getElementById("sec").innerHTML = seconds1;
//     document.getElementById("days1").innerHTML = days1;
//     document.getElementById("hours1").innerHTML = hours1;
//     document.getElementById("mins1").innerHTML = minutes1;
//     document.getElementById("sec1").innerHTML = seconds1;
// }


