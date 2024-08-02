
<link rel="stylesheet" href="http://localhost/examfinal/app/asset/css/gallery.css">
<!-- gallery -->
<input type="radio" name="Photos" id="check1" cheked>
  <input type="radio" name="Photos" id="check2" >
  <input type="radio" name="Photos" id="check3" >
  <input type="radio" name="Photos" id="check4" >

  <div class="container">
       <h2 class="title">OUR PHOTO GALLERY </h2>
    

    <div class="photo-gallery">
    <?php $listProduct = $data["listProduct"]; ?>
   <?php foreach ($listProduct as $key => $value) : ?>
         <div class="pic place">
           <img src="<?php echo $value->img?>"  alt="">
         </div>     
      <?php endforeach; ?>
    </div>
  </div>







<!----- Javascript for Toggle Menu ----->
    <script>

        var navLinks= document.getElementById("navLinks");
        function showMenu(){
            navLinks.style.right = "0";
        }
        function hideMenu(){
            navLinks.style.right = "-200px";
        }

    </script>
</body>
</html>