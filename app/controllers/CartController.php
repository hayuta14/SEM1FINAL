<?php 
class CartController extends BaseController {
    private $__ProductModel;
    function __construct($conn)
    {
        
        $this->__ProductModel = $this->initModel("ProductModel",$conn);
        
    }

    public function index() {
        
        $listProduct =  $this->__ProductModel->listProductOfCart();
        $this->view("layouts/client_layout", ["content"=>"cart", "listProduct"=>$listProduct]);
    }
}
?>