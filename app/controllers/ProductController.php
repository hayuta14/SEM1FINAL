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
    function addToCart() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['pid'];
            $content = $_POST['pname'];
            $price = $_POST['pprice'];
            $img = $_POST['pimage'];
            $category = $_POST['pcategory'];
            $pamount = $_POST['pqty'];
            $total_price = $price * $pamount;
            $name = "product_id";
            $data=$this->__ProductModel->checkItemInCart($id,$name);
            
            if(!$data){
                $this->__ProductModel->createProduct($content,$category,$price,$img,$pamount,$total_price,$id);
                echo "update sucess";
            } else {
                $name="amount";
                $data=$this->__ProductModel->checkItemInCart($id,$name);
                $data += 1;
                $total_price = $price * $data;
                $this->__ProductModel->updateAmountById($id,$data,$total_price );
                echo "ok";
            }

        } else {
            
        }
    }
    
    // Get no.of items available in the cart table
    public function load_cart_item_number(){
        if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
            $row=$this->__ProductModel->countProduct();   
            echo $row;            
        }

    }

    public function plusProduct(){
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $content="id";
            $name="amount";
            $data=$this->__ProductModel->checkItemInCart($id,$name,$content);
            
            $data += 1;
            $name="price";
            $price=$this->__ProductModel->checkItemInCart($id,$name,$content);
            $total_price = $price * $data;
            $this->__ProductModel->updateAmountById($id,$data,$total_price,$content );
            header("Location: http://localhost/examfinal/cart/index");
        }
    }
    public function minusProduct(){
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $content="id";
            $name="amount";
            $data=$this->__ProductModel->checkItemInCart($id,$name,$content);
            
            $data -= 1;
            $name="price";
            $price=$this->__ProductModel->checkItemInCart($id,$name,$content);
            $total_price = $price * $data;
            $this->__ProductModel->updateAmountById($id,$data,$total_price,$content );
            header("Location: http://localhost/examfinal/cart/index");
        }}
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
            $page = ($page-1)*3;
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
            $page = ($page-1)*3;
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
            $page = ($page-1)*3;
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
            $page = ($page-1)*3;
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
            $page = ($page-1)*3;
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