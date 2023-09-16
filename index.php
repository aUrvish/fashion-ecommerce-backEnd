<?php 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header('Access-Control-Allow-Credentials: true');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            box-sizing : border-box;
            margin : 0;
            padding : 0;
        }

        body {
            height : 100vh;
            width : 100vw;
            display : grid;
            place-items:center;
        }
    </style>

</head>
<body>
    <img src="./images/logo-dark.svg" alt="Logo">
</body>
</html>