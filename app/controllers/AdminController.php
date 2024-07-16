<?php 
class AdminController extends BaseController {
    private $__AdminModel;
    function __construct($conn)
    {
        
        $this->__AdminModel = $this->initModel("AdminModel",$conn);
        
    }
    public function index() {
        $this->view("admin", ["content"=>"admin/homeAdmin"]);
    }
    public function execute($id = null){
        
        if(isset($_POST["submit"])){
            $content = $_POST["content"];
            
            $oldPrice = $_POST["oldPrice"];
            $newPrice = $_POST["newPrice"];
            $img1 = $_POST["img1"];
            $img2 = $_POST["img2"];
            $id =  $_POST["id"];
            $category = $_POST["category"];
            $status = $_POST["status"];
            if(empty($id)){
                $this->__AdminModel->createProduct($content,$category, $oldPrice,$newPrice,$img1,$img2,$status);
            } else {
                $this->__AdminModel->updateProductById($id,$content,$category, $oldPrice,$newPrice,$img1,$img2,$status);
            }
        }else{
                
                $product = $this->__AdminModel->getProductById($id);
                $listProduct =  $this->__AdminModel->listProduct();
                $numberOfPage = $this->__AdminModel->numOfPage();
                $this->view("admin", ["content"=>"admin/updateProduct", "product"=>$product, "listProduct"=>$listProduct, "numberOfPage"=>$numberOfPage]);
                }
                }
                public function delete($id) {
                    $this->__AdminModel->deleteProductById($id);
                } 
            }
        
        
    





?>