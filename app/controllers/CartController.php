<?php 
class CartController extends BaseController {
    private $__ProductModel;
    private $__CartModel;
    function __construct($conn)
    {
        
        $this->__ProductModel = $this->initModel("ProductModel",$conn);
        $this->__CartModel = $this->initModel("CartModel",$conn);
        
    }

    public function index() {
        if(isset($_SESSION["user"])){

            $user_id=$_SESSION["user"]["id"];
            $quantity = $this->__ProductModel->totalQuantity($user_id);
            $total_price = $this->__ProductModel->totalPrice($user_id);
            $this->__ProductModel->checkAmountOfCart();
            $listProduct =  $this->__ProductModel->listProductOfCart($user_id);
            
            $this->view("layouts/client_layout", ["content"=>"cart", "listProduct"=>$listProduct, "quantity"=>$quantity, "total_price"=>$total_price]);
        } else {
            $quantity = $this->__ProductModel->totalQuantity();
            $total_price = $this->__ProductModel->totalPrice();
            $this->__ProductModel->checkAmountOfCart();
            $listProduct =  $this->__ProductModel->listProductOfCart();
            
            $this->view("layouts/client_layout", ["content"=>"cart", "listProduct"=>$listProduct, "quantity"=>$quantity, "total_price"=>$total_price]);
        }
    }
    
    
    public function checkout(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
              
              $name = "";
              $email = "";
              $phone = "";
              $address = "";
              $error="";
              if (empty($_POST["name"])) {
                  $nameErr = "Name is required";
                  $error="yes";
              } else {
                  $nameErr="";
                  $name = test_input($_POST["name"]);
              }
              
              if (empty($_POST["email"])) {
                  $emailErr = "Email is required";
                  $error="yes";
              } elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["email"])){
                  $emailErr = "You did not enter a valid email.";
                  $error="yes";
              } else {
                  $emailErr="";
                  $email = test_input($_POST["email"]);
              }
              
              if (empty($_POST["phone"])) {
                  $phoneErr = "Phone is required";
                  $error="yes";
              } else {
                  $phoneErr="";
                  $phone = test_input($_POST["phone"]);
              }
              
              if (empty($_POST["address"])) {
                $error="yes";
                $addressErr = "Address is required";
              } else {
                  $addressErr="";
                  $address = test_input($_POST["address"]);
              }
              if(!empty($error)){

                  $quantity = $this->__ProductModel->totalQuantity();
                  $total_price = $this->__ProductModel->totalPrice();
                  $this->__ProductModel->checkAmountOfCart();
                  $listProduct =  $this->__ProductModel->listProductOfCart();
                   $this->view("layouts/client_layout", ["content"=>"cart", "listProduct"=>$listProduct,"error"=>[$nameErr,$emailErr,$phoneErr,$addressErr],"name"=>[$name,$email,$phone,$address], "quantity"=>$quantity, "total_price"=>$total_price]);
              } else {

                  $name = test_input($_POST["name"]);
                  $email = test_input($_POST["email"]);
                  $phone = test_input($_POST["phone"]);
                  $address = test_input($_POST["address"]);
                  $date = test_input($_POST["date"]);
                  $total_price = $_POST["total_price"];
                  $user_id = $_POST["user_id"];
                if(!empty($_POST["name"])&&!empty($_POST["email"])&&!empty($_POST["phone"])&&!empty($_POST["address"])){
                    
                    $this->__CartModel->createReceiver($name,$address,$email,$phone);
                    $this->__CartModel->insertDataToOrder($date,$user_id,$total_price,$email);
                    $this->__CartModel->insertDataToOrderDetail($total_price);
                    $this->__CartModel->deleteCart();
                    header("Location: http://localhost/examfinal/product/thankForBuy");
                    
                } 
              }
            
        }
    }

}
?>