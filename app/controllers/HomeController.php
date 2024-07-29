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
        
        $this->view("layouts/client_layout", ["content"=>"home"]);
        
    }
    //action : create ,params [$a, $b]
    public function create($a, $b) {
        
    }
}

?>