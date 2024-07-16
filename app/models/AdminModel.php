<?php 
    class AdminModel {
        private $__conn;
        public function __construct($conn) {
            $this->__conn = $conn;
        }
        public function createProduct($content,$category, $oldPrice,$newPrice,$img1,$img2,$status) { 
            $sql = "insert into product (`content`, `category`, `oldPrice`, `newPrice`, `img1`, `img2`, `status`) values (:content, :category, :oldPrice, :newPrice, :img1, :img2, :status)";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam("content", $content, PDO::PARAM_STR);
            $stmt->bindParam("category", $category, PDO::PARAM_STR);   
            $stmt->bindParam("oldPrice", $oldPrice, PDO::PARAM_STR);
            $stmt->bindParam("newPrice", $newPrice, PDO::PARAM_STR);
            $stmt->bindParam("img1", $img1, PDO::PARAM_STR);
            $stmt->bindParam("img2", $img2, PDO::PARAM_STR);
            $stmt->bindParam("status", $status, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: http://localhost/examfinal/admin/execute");
        }
        public function numOfPage(){
            $row_per_page=5;
            $sql1 ="select count(*) from product";
            $stmt1 = $this->__conn->prepare($sql1);
            $stmt1->execute();
            $nr_of_row = $stmt1->fetchColumn();
            $page=ceil($nr_of_row/$row_per_page);
            return $page;
        }
        public function listProduct(){
            //pagination
            $start=0;
            $row_per_page=5;
            
            
            try {
                if (isset($this->__conn)) {
                    $sql = "select * from product order by id desc limit $start,$row_per_page ";
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
        public function getProductById($id) {
            try {  
                $sql = "select * from product where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                return $result;
            } catch(Exception $e) {
                echo $e->getMessage();
                exit();
            }
        }
        public function updateProductById($id, $content,$star, $oldPrice,$newPrice,$img) {
            try {  
                $sql = "update product set name = :content, star = :star, oldPrice = :oldPrice, newPrice= :newPrice, img= :img where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->bindParam("content", $content, PDO::PARAM_STR);
                $stmt->bindParam("star", $star, PDO::PARAM_STR);
                $stmt->bindParam("oldPrice", $oldPrice, PDO::PARAM_STR);
                $stmt->bindParam("newPrice", $newPrice, PDO::PARAM_STR);
                $stmt->bindParam("img", $img, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: http://localhost/examfinal/admin/execute");
            } catch(Exception $e) {
                echo $e->getMessage();
                exit();
            }
        }
        public function deleteProductById($id) {
            try {  
                $sql = "delete from product where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: http://localhost/examfinal/admin/execute");
            } catch(Exception $e) {
                echo $e->getMessage();
                exit();
            }
        }
    }

?>