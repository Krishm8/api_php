<?php

    include "../../Config.php";

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");   

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $pid = $_POST["pid"];
        $tid = $_POST["tid"];
        
        $config = new Config();

        $res = $config->createTicket($pid, $tid);

        if($res){
            $arr["msg"] = "Ticket successful created...";
        } else {
            $arr["msg"] = "Ticket failed to create...";
        }

    } else {
        $arr["error"] = "Only POST http request method is allow...";
    }

    echo json_encode($arr);

?>