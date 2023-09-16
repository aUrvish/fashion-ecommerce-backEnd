<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../config.php";

$response = false;
$exerror = false;
$imgs = array();

if ($_POST['pid'] != '' && $_POST['pname'] != '' && $_POST['cat'] != '' && $_POST['desc'] != '' && $_POST['brand'] && $_POST['color'] && $_POST['stock'] && $_FILES['file']['name'] != '') {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $img = $_FILES['file']['name'];
    $img_temp = $_FILES['file']['tmp_name'];
    $cat = $_POST['cat'];
    $ptype = $_POST['ptype'];
    $psize = $_POST['psize'];
    $desc = $_POST['desc'];
    $stock = number_format( $_POST['stock']);
    $brand = $_POST['brand'];
    $color = implode(',', $_POST['pcolor']);
    $sell = $_POST['sell'];
    $mrp = $_POST['mrp'];
    $rate = rand(1,5);
    $review = rand(1,100);
    
    $file_dir = '../../images/';
    
    for ($i=0; $i < count($img); $i++) { 

        $extension = pathinfo($img[$i], PATHINFO_EXTENSION);

        if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif')
        {
            $bname = basename(rand(99999999,999999999)).".".$extension;
            $target_file = $file_dir . $bname;
            array_push($imgs , $bname);
                if(move_uploaded_file($img_temp[$i] , $target_file)){
                    $response = true;
                }else {
                    $response = false;
                }
        }
        
    }
    
    if($response) {
        $sql = "INSERT INTO product (`id`, `pname`, `image`, `catagory`, `description`, `stock`, `brand`, `color`,  `rate`, `review`, `mrp`, `sell`, `ptype`, `size`) VALUES ($pid,'".$pname."','".implode( ',', $imgs)."','".$cat."','".$desc."', $stock ,'".$brand."','".$color."',$rate , $review, $mrp , $sell, '".$ptype."', '".$psize."')";
        if(mysqli_query($conn, $sql) or die('Querry not run')){
            echo json_encode(array("message"=>"Product added successfully" ,"data"=> array(), "error"=>false));
        }else {
            echo json_encode(array("message"=>"Product not added" ,"data"=> array(), "error"=>true));
        }
    }else {
        echo json_encode(array("message"=>"Product not added" ,"data"=> array(), "error"=>true));
    }
    
}else {
    echo json_encode(array("message"=>"Filds are required" ,"data"=> array(), "error"=>true));
}

?>