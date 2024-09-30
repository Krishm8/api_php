<?php

    include "../../Config.php";

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");   

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $tname = $_POST["tname"];
        $from = $_POST["from"];
        $to = $_POST["to"];
        
        $config = new Config();

        $res = $config->addTrain($tname, $from, $to);

        if($res){
            $arr["msg"] = "Train successful added...";
        } else {
            $arr["msg"] = "Train failed to add...";
        }

    } else {
        $arr["error"] = "Only POST http request method is allow...";
    }

    echo json_encode($arr);

?>