<?php
class CartModel{
    private $__conn;
    public function __construct($conn) {
        $this->__conn = $conn;
    }

    public function createReceiver($fullName,$address,$email,$phone) { 
        try {
        $sql = "insert into receiver (`fullName`,`address`,`email`,`phone`) values (:fullName, :address, :email, :phone)
                ";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bindParam("fullName", $fullName, PDO::PARAM_STR);
        $stmt->bindParam("address", $address, PDO::PARAM_STR);
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $stmt->bindParam("phone", $phone, PDO::PARAM_STR);
        $stmt->execute();   
        $id = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        return $id;
    } catch(Exception $e) {
        echo $e->getMessage();
        exit();
    } 
    }


    public function insertDataToOrder($date,$user_id,$total_price,$email){
        try {
        $sql = "insert into `order` (`date`,`user_id`,`total_price`,`receiver_id`) values (:date, :user_id, :total_price,(SELECT id FROM receiver WHERE email = :email order by id desc limit 1 ))";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bindParam("date", $date, PDO::PARAM_STR);
        $stmt->bindParam("user_id", $user_id, PDO::PARAM_STR);
        $stmt->bindParam("total_price", $total_price, PDO::PARAM_STR);
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $stmt->execute(); 
    } catch(Exception $e) {
        echo $e->getMessage();
        exit();
    } 
    }



    public function insertDataToOrderDetail($total_price){
        try{
            $sql = "INSERT INTO `order_detail` (`product_id`, `order_id`, `amount`, `price`)
                    SELECT 
                        c.`product_id`, 
                        (SELECT id from `order` where total_price = $total_price order by id desc limit 1), 
                        c.`amount`, 
                        p.`newPrice`
                    FROM `cart` c
                    JOIN `product` p ON c.`product_id` = p.`id`
                    ";
            $stmt = $this->__conn->prepare($sql);
            $stmt->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        } 
    }

    public function deleteCart(){
        try {  
            $sql = "TRUNCATE TABLE cart; ";
            $stmt = $this->__conn->prepare($sql);
            
            $stmt->execute();
            
        } catch(Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

?>