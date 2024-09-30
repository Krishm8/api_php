<?php

    include "../../Config.php";

    header("Access-Control-Allow-Method: PUT , PATCH");
    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH"){

        $input = file_get_contents("php://input");

        parse_str($input, $_UPDATE);

        $tname = $_UPDATE["tname"];
        $from = $_UPDATE["from"];
        $to = $_UPDATE["to"];
        $id = $_UPDATE["id"];

        $config = new Config();

        $res = $config->updateTrain($tname, $from, $to, $id);

        if($res){
            $arr["msg"] = "Train successfuly updated...";
        } else {
            $arr["msg"] = "Train failed to updated...";
        }

    } else {
        $arr["error"] = "Only PUT or PATCH http request method is allow...";
    }

    echo json_encode($arr);

?>