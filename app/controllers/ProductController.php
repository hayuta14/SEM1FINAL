<?php 
class ProductController extends BaseController {
    private $__ProductModel;
    function __construct($conn)
    {
        
        $this->__ProductModel = $this->initModel("ProductModel",$conn);
        
    }
    public function index() {
        $listProduct =  $this->__ProductModel->listProduct();
        $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct]);
    }

    public function thankForBuy(){
        $this->view("buySuccess");
    }
    /////CART///////////
    function addToCart() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if(isset($_POST['cartItem'])){
                
                $product_id = $_POST['pid'];
               
                $pamount = $_POST['pqty'];
                
                $data=$this->__ProductModel->checkItemInCart($product_id,$product_id);
                if(isset($_SESSION["user"])){
                    $user_id=$_SESSION["user"]["id"];
                } else {
                    $user_id="";
                }
                if(!$data){
                    $this->__ProductModel->createProduct($pamount,$user_id,$product_id);
                    echo "update sucess";
                } else {
                    $name="amount";
                    $data=$this->__ProductModel->checkItemInCart($product_id,$name);
                    $data += 1;
                    $this->__ProductModel->updateAmountById($product_id,$data );
                    echo "ok";
                }
            } 
            
            if(isset($_POST['click_view_btn'])){
                $id = $_POST['user_id'];
                
                $listProduct =  $this->__ProductModel->listProductById($id);
                foreach ($listProduct as $data) {
                    $id         = $data->id;
                    $content    = $data->content;
                    $category    = $data->category;
                    $price       = $data->newPrice;
                    $img       = $data->img1;
                    $img2       = $data->img2;
                    echo'
                        
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="insertDataLabel">'.$content.'</h1>
                            
                        </div>
                        <div class="modal_content">
                            
                            
                            <!-- Slider main container -->
                            <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide"><img class="img_detail" src="'.$img.'" alt=""></div>  
                            </div>
                                 <div class="product__rating">
                            
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            </div>
                            <div>Price: '.$price.'$</div>
                        </div>
                      
                           
                
                    ';
                }
                

            }

            if(isset($_POST['click_view_id_btn'])){
                $id = $_POST['user_id'];
                echo $id;
            }

        } else {
            
        }
    }
    
    // Get no.of items available in the cart table
    public function load_cart_item_number(){
        if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
            $row=$this->__ProductModel->totalQuantity();   
            echo $row;            
        }

    }

    public function plusProduct(){
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $content="product_id";
            $name="amount";
            $data=$this->__ProductModel->checkItemInCart($id,$name,$content);
            $data += 1;
            $this->__ProductModel->updateAmountById($id,$data,$content );
            header("Location: http://localhost/examfinal/cart/index");
        }
    }
    public function minusProduct(){
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $content="product_id";
            $name="amount";
            $data=$this->__ProductModel->checkItemInCart($id,$name,$content);
            $data -= 1;
            $this->__ProductModel->updateAmountById($id,$data,$content );
            header("Location: http://localhost/examfinal/cart/index");
        }}
        ///////////////////////////////////////////////////////
    public function All(){
        $_SERVER["PATH_INFO"];
        $string = explode("/",$_SERVER["PATH_INFO"]);
        $name= $string[2];
        if($name =="All"){
            $name = "product";
        }
        $page="0";
        if(isset($_GET["page"])){

            $page = $_GET["page"];
            $page = ($page-1)*12;
        }
        $content="content";
        $action="ASC";
        if(isset($_GET["cake"])){
            $cut = explode("-",$_GET["cake"]);
            $content=$cut[0];
            $action=$cut[1];
            if($_GET["cake"]=="content-desc"){
                //gap of table
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage();
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-asc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage();
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-desc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage();
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-newest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($action);
                $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-oldest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($action);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else {
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage();
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
        } else{    
            $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
            
            $numberOfPage=$this->__ProductModel->numOfPage();
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
    }
    
    public function cake(){
        $_SERVER["PATH_INFO"];
        $string = explode("/",$_SERVER["PATH_INFO"]);
        $name= $string[2];
        if($name =="All"){
            $name = "product";
        }
        $page="0";
        if(isset($_GET["page"])){

            $page = $_GET["page"];
            $page = ($page-1)*12;
        }
        $content="content";
        $action="ASC";
        if(isset($_GET["cake"])){
            $cut = explode("-",$_GET["cake"]);
            $content=$cut[0];
            $action=$cut[1];
            $where=$content."="."'".$action."'";
            
            if($_GET["cake"]=="content-desc"){
                //gap of table
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-asc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-desc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-newest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
                
                
                $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-oldest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else {
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
        } else{    
            $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
            
            $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
    }

    public function pastries(){
        $_SERVER["PATH_INFO"];
        $string = explode("/",$_SERVER["PATH_INFO"]);
        $name= $string[2];
        if($name =="All"){
            $name = "product";
        }
        $page="0";
        if(isset($_GET["page"])){

            $page = $_GET["page"];
            $page = ($page-1)*12;
        }
        $content="content";
        $action="ASC";
        if(isset($_GET["cake"])){
            $cut = explode("-",$_GET["cake"]);
            $content=$cut[0];
            $action=$cut[1];
            $where=$content."="."'".$action."'";
            
            if($_GET["cake"]=="content-desc"){
                //gap of table
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-asc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-desc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-newest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
                
                
                $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-oldest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else {
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
        } else{    
            $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
            
            $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
    }
    
    public function cookies(){
        $_SERVER["PATH_INFO"];
        $string = explode("/",$_SERVER["PATH_INFO"]);
        $name= $string[2];
        if($name =="All"){
            $name = "product";
        }
        $page="0";
        if(isset($_GET["page"])){

            $page = $_GET["page"];
            $page = ($page-1)*12;
        }
        $content="content";
        $action="ASC";
        if(isset($_GET["cake"])){
            $cut = explode("-",$_GET["cake"]);
            $content=$cut[0];
            $action=$cut[1];
            $where=$content."="."'".$action."'";
            
            if($_GET["cake"]=="content-desc"){
                //gap of table
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-asc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-desc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-newest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
                
                
                $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-oldest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else {
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
        } else{    
            $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
            
            $numberOfPage=$this->__ProductModel->numOfPage($name);
            
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
    }

    public function pies(){
        $_SERVER["PATH_INFO"];
        $string = explode("/",$_SERVER["PATH_INFO"]);
        $name= $string[2];
        if($name =="All"){
            $name = "product";
        }
        $page="0";
        if(isset($_GET["page"])){

            $page = $_GET["page"];
            $page = ($page-1)*12;
        }
        $content="content";
        $action="ASC";
        if(isset($_GET["cake"])){
            $cut = explode("-",$_GET["cake"]);
            $content=$cut[0];
            $action=$cut[1];
            $where=$content."="."'".$action."'";
            
            if($_GET["cake"]=="content-desc"){
                //gap of table
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-asc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="newPrice-desc"){
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-newest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
                
                
                $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else if($_GET["cake"]=="status-oldest"){
                
                $listProduct=$this->__ProductModel->newOrOld($name,$content,$action,$page);
                
                $numberOfPage=$this->__ProductModel->numOfPage($name,$where);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            } else {
                
                $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
                $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
        } else{    
            $listProduct=$this->__ProductModel->listProduct($name,$content,$action,$page);
            
            $numberOfPage=$this->__ProductModel->numOfPage($name);
            $this->view("layouts/client_layout", ["content"=>"product", "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
            }
    }

}

?>