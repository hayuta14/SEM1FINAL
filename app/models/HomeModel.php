<?php 
class HomeModel {
    private $__conn;
    public function __construct($conn) {
        $this->__conn = $conn;
    }

    public function getAllCustomers() {
        try {
            if(isset($this->__conn)) {
                $sql = "select * from customers";
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
            } else {
                echo "not connection";
                die();
            }
        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
        return null;   
    }
}




?>