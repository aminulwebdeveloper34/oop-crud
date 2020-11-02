<?php
require_once 'navbar.php';
require_once 'server.php';

class Forms{
    public function form() {
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $amount = $_POST['amount'];


            $obj = new database();
            $obj->saveRecords($name, $amount);

        }
    }


    public function formss(){

        $forms ='<div class="container">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" class="form-control" id="name" required placeholder="Enter Name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="amount">Amount:</label>
                            <div class="col-sm-4">
                                <input type="number"  name="amount" class="form-control" id="amount" required placeholder="Enter Amount">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-success" name="submit" value="submit">
                            </div>
                        </div>
                    </form>
                </div>';

        return $forms;
    }


}
$objForm=new Forms();
$objForm->form();
$forms=$objForm->formss();
echo $forms;




