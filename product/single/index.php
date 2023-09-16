<?php
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Content-Type: application/json; charset=UTF-8");    
    header("Access-Control-Allow-Methods: POST, DELETE, OPTIONS");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include "../../config.php";

    $res = json_decode(file_get_contents("php://input") ,true);
    if($res['id']){
        $sql = "SELECT * FROM `product` WHERE id = ". $res['id'];
        $result = mysqli_query($conn , $sql) or die('Querry not run');
        if($result){
            if(mysqli_num_rows($result) > 0) {
                $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode(array("message"=>"Product fetch successfully" ,"data"=> $output[0], "error"=>false));
            }else {
                    echo json_encode(array("message"=>"Product not fetch" ,"data"=> array(), "error"=>true));
            }
        }
    }else{
        echo json_encode(array("message"=>"please set product ID as id" ,"data"=> array(), "error"=>true));
    }
?>



