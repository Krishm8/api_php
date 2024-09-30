<?php

    include "../../Config.php";

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");   


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $config = new Config();

        $id = $_POST["id"];

        $res = $config->fetchTrain($id);

        if($res){
            $arr["msg"] = $res;
        } else {
            $arr["msg"] = "No Train...";
        }

    } else {
        $arr["error"] = "Only POST http request method is allow...";
    }

    echo json_encode($arr);

?>