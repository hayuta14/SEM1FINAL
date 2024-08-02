<?php 
class AboutController extends BaseController {
    private $__AboutModel;
    function __construct($conn)
    {
        
        $this->__AboutModel = $this->initModel("AdminModel",$conn);
        
    }

    public function index() {
        $this->view("layouts/client_layout", ["content"=>"about"]);
    }
}
?>