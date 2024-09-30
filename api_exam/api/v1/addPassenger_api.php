<?php

    include "../../Config.php";

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");   

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $name = $_POST["name"];
        $pnumber = $_POST["pnumber"];
        
        $config = new Config();

        $res = $config->addPassenger($name, $pnumber);

        if($res){
            $arr["msg"] = "Passenger successful added...";
        } else {
            $arr["msg"] = "Passenger failed to add...";
        }

    } else {
        $arr["error"] = "Only POST http request method is allow...";
    }

    echo json_encode($arr);

?>