<?php

    include "../../Config.php";

    header("Access-Control-Allow-Method: PUT , PATCH");
    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH"){

        $input = file_get_contents("php://input");

        parse_str($input, $_UPDATE);

        $name = $_UPDATE["name"];
        $pnumber = $_UPDATE["pnumber"];
        $id = $_UPDATE["id"];

        $config = new Config();

        $res = $config->updatePassenger($name, $pnumber, $id);

        if($res){
            $arr["msg"] = "Passenger successfuly updated...";
        } else {
            $arr["msg"] = "Passenger failed to updated...";
        }

    } else {
        $arr["error"] = "Only PUT or PATCH http request method is allow...";
    }

    echo json_encode($arr);

?>