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
    
}

?>