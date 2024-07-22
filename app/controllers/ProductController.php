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