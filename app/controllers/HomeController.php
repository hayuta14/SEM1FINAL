<?php 
// controller
class HomeController extends BaseController {
    private $__homeModel;
    function __construct($conn)
    {
        
        $this->__homeModel = $this->initModel("HomeModel",$conn);
        
    }
    //action
    public function index() {
        $customers = $this->__homeModel->getAllCustomers();
        $this->view("layouts/client_layout", ["content"=>"home", "customers"=>$customers]);
        
    }
    //action : create ,params [$a, $b]
    public function create($a, $b) {
        
    }
}

?>