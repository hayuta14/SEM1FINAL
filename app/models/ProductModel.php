<?php 
 class ProductModel{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    
    public function numOfPage($name="product",$from="1",$table="category"){
        $row_per_page=3;
        $sql1 ="select count(*) from $name where status = 'newest' ";
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

    public function Pagination(){

    }
 }

?>