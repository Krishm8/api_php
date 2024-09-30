<?php

    include "../../Config.php";

    header("Access-Control-Allow-Method: DELETE");
    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"] == "DELETE"){

        $input = file_get_contents("php://input");

        parse_str($input, $_DELETE);

        $id = $_DELETE["id"];

        $config = new Config();

        $res = $config->deletePassenger($id);

        if($res){
            $arr["msg"] = "Passenger successfuly deleted...";
        } else {
            $arr["msg"] = "Passenger failed to delete...";
        }

    } else {
        $arr["error"] = "Only DELETE http request method is allow...";
    }

    echo json_encode($arr);
?>