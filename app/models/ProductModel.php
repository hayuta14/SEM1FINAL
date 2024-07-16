<?php 
 class ProductModel{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function listProduct(){
        try {
            if (isset($this->__conn)) {
                $sql = "select * from product order by id desc ";
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
 }

?>