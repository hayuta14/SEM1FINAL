<?php 
// controller
class HomeController extends BaseController {
    private $__ProductModel;
    function __construct($conn)
    {
        
        $this->__ProductModel = $this->initModel("ProductModel",$conn);
        
    }
    //action
    public function index() {
        $listProduct =  $this->__ProductModel->listCategory();
        $this->view("layouts/client_layout", ["content"=>"home","listProduct"=>$listProduct]);
        
    }
    //action : create ,params [$a, $b]
    public function create($a, $b) {
        
    }
}

?>