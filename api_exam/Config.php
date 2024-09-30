<?php

    class Config{
        private $servername = "127.0.0.1";
        private $username = "root";
        private $password = "";
        private $dbname = "railway";
        public $conn;

        function initConnection(){
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        }

        function addPassenger($name, $pnumber){
            $this->initConnection();

            $query = "INSERT INTO passengers(name,pnumber) VALUES('$name',$pnumber);";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        function deletePassenger($id){
            $this->initConnection();

            $query = "DELETE FROM passengers WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        function fetchPassenger($id){
            $this->initConnection();

            $query = "SELECT * FROM passengers WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            $records = mysqli_fetch_assoc($res);

            return $records;
        }

        function updatePassenger($name, $pnumber, $id){
            $this->initConnection();

            $query = "UPDATE passengers SET name=$name pnumber=$pnumber WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        function addTrain($tname, $from, $to){
            $this->initConnection();

            $query = "INSERT INTO train(tname, from, to) VALUES('$tname', '$from', '$to');";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        function deleteTrain($id){
            $this->initConnection();

            $query = "DELETE FROM train WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        function fetchTrain($id){
            $this->initConnection();

            $query = "SELECT * FROM train WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            $records = mysqli_fetch_assoc($res);

            return $records;
        }

        function updateTrain($tname, $from, $to, $id){

            $this->initConnection();

            $query = "UPDATE train SET tname='$tname' from='$from' WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        function createTicket($pid, $tid){
            $this->initConnection();

            $q = "SELECT * FROM passengers WHERE id=$pid";

            $r = mysqli_query($this->conn, $q);

            $res = mysqli_fetch_assoc($r);

            if($res){
                $query = "INSERT INTO ticket (pid, tid) VALUES ($pid, $tid)";

                $response = mysqli_query($this->conn, $query);

                return $response;
            } else {
                return false;
            }
        }
    }

?>