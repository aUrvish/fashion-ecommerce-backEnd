<?php 
    include "../config.php";
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, DELETE, OPTIONS");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    $sql = "SELECT * FROM product";
    
    $result = mysqli_query($conn , $sql) or die('Querry not run');
    
    if(mysqli_num_rows($result) > 0) {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    }else {
        echo 'not fetch';
    }

?>