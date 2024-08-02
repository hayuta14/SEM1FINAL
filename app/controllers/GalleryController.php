<?php 
class GalleryController extends BaseController {
    private $__GalleryModel;
    function __construct($conn)
    {
        
        $this->__GalleryModel = $this->initModel("GalleryModel",$conn);
        
    }

    public function index() {
        $listProduct =  $this->__GalleryModel->listImg();
        $this->view("layouts/client_layout", ["content"=>"gallery","listProduct"=>$listProduct]);
    }
}
?>