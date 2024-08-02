<?php 
class ContactController extends BaseController {
    private $__ContactModel;
    function __construct($conn)
    {
        
        $this->__ContactModel = $this->initModel("AdminModel",$conn);
        
    }

    public function index() {
        $this->view("layouts/client_layout", ["content"=>"contact"]);
    }
}
?>