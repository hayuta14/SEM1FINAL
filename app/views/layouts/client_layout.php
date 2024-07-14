<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/examfinal/app/asset/css/<?php echo($data["content"]);?>.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title><?php echo($data["content"]);?></title>
</head>
<body>
    <?php 
        $this->view("layouts/header");
    ?>


    <?php
        
        $this->view($data["content"], $data);
        $this->view("layouts/footer");
    ?>
</body>
</html>