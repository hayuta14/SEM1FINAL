<?php 
 class ProductModel{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    
    public function numOfPage($name="product",$from="1",$table="category"){
        $row_per_page=3;
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
                $sql = " select * from $name order by $content $order limit $page,3 ";
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

    public function listProductOfCart($name="cart"){
        
        try {
            if (isset($this->__conn)) {
                $sql = " select * from $name ";
                
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
                
                $sql = "select * from $name where $content = '$action' limit $page,3";
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

    public function createProduct($content,$category,$price,$img,$amount,$total_price,$product_id) { 
        $sql = "insert into cart (`content`, `category`, `price`, `img`, `amount`, `total_price`, `product_id`) values (:content, :category, :price, :img, :amount, :total_price, :product_id)";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bindParam("content", $content, PDO::PARAM_STR);
        $stmt->bindParam("category", $category, PDO::PARAM_STR);   
        $stmt->bindParam("price", $price, PDO::PARAM_STR);
        $stmt->bindParam("img", $img, PDO::PARAM_STR);
        $stmt->bindParam("amount", $amount, PDO::PARAM_STR);
        $stmt->bindParam("total_price", $total_price, PDO::PARAM_STR);
        $stmt->bindParam("product_id", $product_id, PDO::PARAM_STR);
        
        $stmt->execute();
        
    }

    public function updateAmountById($id,$amount,$price,$content="product_id" ) {
        try {  
            $sql = "update cart set amount = :amount, total_price = $price where $content = :id";
            
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->bindParam("amount", $amount, PDO::PARAM_STR);
            
            
            $stmt->execute();
            
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function checkItemInCart($pid , $name, $content="product_id") {
        try {
            $sql = "SELECT $name FROM cart WHERE $content = $pid";
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

    public function countProduct( ) {
        try {  
            $sql = "SELECT SUM(amount) FROM CART ";
            $stmt = $this->__conn->prepare($sql);
            
            $stmt->execute();
            $row = $stmt->fetchColumn();
            return $row;
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
 }


?>