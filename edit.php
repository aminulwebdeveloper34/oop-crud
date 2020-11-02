<?php
require_once 'navbar.php';
require_once 'server.php';

class Edit{

    public function editdata(){
        $obj = new database();
        $conn = $obj->connect();

        $userid=$_GET['userid'];


        $id=$_POST['id'];
        $name=$_POST['name'];
        $amount=$_POST['amount'];

        if(!empty($name) && !empty($amount)){

            $sqls = "UPDATE simple_crude_table SET name='$name',amount='$amount' WHERE id=$id";
            $records = $conn->query($sqls);
            header("Location:http://localhost/simple-crud/view.php");
        }

        if(!empty($userid)){

            $sql = "SELECT * FROM simple_crude_table where id=$userid";
            $records = $conn->query($sql);

        }



        foreach ($records as $record) {

            $data = '<div class="container">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="'. $record['id'] .'" class="form-control" id="name" placeholder="Enter Name" >
                                <input type="text" name="name" value="'. $record['name'] .'" class="form-control" id="name" placeholder="Enter Name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="amount">Amount:</label>
                            <div class="col-sm-4">
                                <input type="number"  name="amount" value="'. $record['amount'] .'" class="form-control" id="amount" placeholder="Enter Amount">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-success" name="update" value="update">
                            </div>
                        </div>
                    </form>
                </div>';
        }
        return $data;
    }


}

$objedit=new Edit();

$tt=$objedit->editdata();
echo $tt;




