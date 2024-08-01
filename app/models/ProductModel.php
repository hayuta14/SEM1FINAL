<?php 
 class ProductModel{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    
    public function numOfPage($name="product",$from="1",$table="category"){
        $row_per_page=12;
        $sql1 ="select count(*) from $name where $from";
        $stmt1 = $this->__conn->prepare($sql1);
        $stmt1->execute();
        $nr_of_row = $stmt1->fetchColumn();
        $page=ceil($nr_of_row/$row_per_page);
        return $page;
    }

    public function listProduct($name="product",$content="content",$order="ASC",$page="0"){
        
        try {
            if (isset($this->__conn)) {
                $sql = " select 
                    $name.id,
                    $name.content,
                    $name.category,
                    $name.newPrice,
                    $name.oldPrice,
                    $name.img1,
                    $name.img2,
                    $name.status,
                    category.category AS category from $name  join category on $name.category=category.id order by $content $order limit $page,12 ";
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();
                // $sql = "select * from [cake] where category = 'cake' order by $name $order  ";
                // $stmt = $this->__conn->prepare($sql);
                // $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                
                return $result;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
    public function listCategory(){
        
        try {
            if (isset($this->__conn)) {
                $sql = " select * from category ; ";
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();
                // $sql = "select * from [cake] where category = 'cake' order by $name $order  ";
                // $stmt = $this->__conn->prepare($sql);
                // $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
    public function listProductById($id){
        
        try {
            if (isset($this->__conn)) {
                $sql = " select * from product where id = $id; ";
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();
                // $sql = "select * from [cake] where category = 'cake' order by $name $order  ";
                // $stmt = $this->__conn->prepare($sql);
                // $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listProductOfCart($user_id=0,$name="cart"){
        
        try {
            if (isset($this->__conn)) {
                $sql = " select product_id,img1,content,newPrice,amount from cart inner join product on cart.product_id = product.id where user_id = $user_id";
                
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();
                // $sql = "select * from [cake] where category = 'cake' order by $name $order  ";
                // $stmt = $this->__conn->prepare($sql);
                // $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
    

    public function newOrOld($name="",$content="",$action="",$page="0"){
        try {
            if (isset($this->__conn)) {
                
                $sql = "select * from $name where $content = '$action' limit $page,12";
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();  
                
                
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function createProduct($amount,$user_id,$product_id) { 
        $sql = "insert into cart (`amount`,`user_id`,`product_id`) values (:amount, :user_id, :product_id)";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bindParam("amount", $amount, PDO::PARAM_STR);
        $stmt->bindParam("product_id", $product_id, PDO::PARAM_STR);
        $stmt->bindParam("user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();
        
    }

    public function updateAmountById($user_id=0,$id,$amount,$content="product_id" ) {
        try {  
            $sql = "update cart set amount = :amount where $content = :id && user_id = $user_id";
            
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->bindParam("amount", $amount, PDO::PARAM_STR);
            
            
            $stmt->execute();
            
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function checkItemInCart($user_id=0,$pid , $name, $content="product_id") {
        try {
            $sql = "SELECT $name FROM cart WHERE $content = $pid && user_id = $user_id";
            $stmt =$this->__conn->prepare($sql);
	        
	        $stmt->execute();
	        
	        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        if(isset($r[0])){
                return $r[0]["$name"];

            } else {
                return "";
            }
        }catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function totalPrice($user_id=0) {
        try {  
            $sql = "SELECT SUM(newPrice * amount)
                    FROM cart
                    LEFT JOIN product ON cart.product_id = product.id
                    where user_id = $user_id;";
            $stmt = $this->__conn->prepare($sql);
            
            $stmt->execute();
            $row = $stmt->fetchColumn();
            return $row;
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function totalQuantity($id=0){
        try {  
            $sql = "select sum(amount) from cart where user_id = $id";
            $stmt = $this->__conn->prepare($sql);
            
            $stmt->execute();
            $row = $stmt->fetchColumn();
            return $row;
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function quantity($id,$user_id){
        try {  
            $sql = "select amount from cart where product_id = $id&& user_id = $user_id";
            
            $stmt = $this->__conn->prepare($sql);
            
            $stmt->execute();
            $row = $stmt->fetchColumn();
            return $row;
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    } 

    

    public function checkAmountOfCart(){
        try {  
            $sql = "delete from cart where amount = 0 ";
            $stmt = $this->__conn->prepare($sql);
            
            $stmt->execute();
            
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
 }


?>