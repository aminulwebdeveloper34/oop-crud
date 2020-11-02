<?php
require_once "navbar.php";

class database{
    public $host = "localhost";
    public $user = "haque";
    public $pass = "Aminul@1";
    public $db = "simple_crud";

    public function connect()
    {
        $con = new mysqli($this->host, $this->user, $this->pass, $this->db);
        return $con;
    }

    public function saveRecords($name, $amount) {

        $server_connection = $this->connect();


        $sql = "insert into simple_crude_table(name,amount) values('$name',$amount)";

        if ($server_connection->query($sql)) {
            echo "New record created successfully";
            header("Location:view.php");

        } else {
            echo "Error: " . $sql . "<br>" . $server_connection->error;
        }


    }



}
$obj = new  database;

?>


<!---->
<!--$sql = "SELECT * FROM simple_table";-->
<!--$results = $server_connection->query($sql);-->
<!---->




