<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../config.php";

$exerror = false;

if ($_POST['pid'] != '' && $_POST['pname'] != '' && $_POST['cate'] != '' && $_POST['desc'] != '' && $_POST['brand'] && $_POST['stock']) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $cat = $_POST['cate'];
    $ptype = $_POST['ptype'];
    $psize = $_POST['psize'];
    $desc = $_POST['desc'];
    $stock = number_format( $_POST['stock']);
    $brand = $_POST['brand'];
    $sell = $_POST['sell'];
    $mrp = $_POST['mrp'];
    
    
        $sql = "UPDATE `product` SET `pname`='".$pname."',`catagory`='".$cat."',`description`='".$desc."',`stock`=$stock,`brand`='".$brand."',`mrp`=$mrp, `ptype`='".$ptype."',`size`='$psize',`sell`=$sell WHERE `id`=".$pid ;

        if(mysqli_query($conn, $sql) or die('Querry not run')){
            echo json_encode(array("message"=>"Product modify successfully" ,"data"=> array(), "error"=>false));
        }else {
            echo json_encode(array("message"=>"Product not modify" ,"data"=> array(), "error"=>true));
        }
    
}else {
    echo json_encode(array("message"=>"Filds are required" ,"data"=> array(), "error"=>true));
}

?>