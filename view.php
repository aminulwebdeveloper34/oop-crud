<?php
require_once 'navbar.php';
require_once 'server.php';
class View{

  public function viewData(){

        $obj = new database();
        $conn = $obj->connect();
      $sql = "SELECT * FROM simple_crude_table ORDER BY id DESC ";
      $records = $conn->query($sql);




      $userid=$_GET['userid'];
      if(!empty($userid)){

          $sql = "DELETE  FROM simple_crude_table where ID=$userid";
          $delete = $conn->query($sql);
if ($delete){



          $sql = "SELECT * FROM simple_crude_table ORDER BY id DESC ";

          $records = $conn->query($sql);
}else{

    echo "Error: ";
}


      }




      $data = '<div class="container">
<form method="GET">
                        <div class="col-sm-offset-1 col-sm-8">
                        <h2>Simple CRUD</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';

        foreach ($records as $record) {

                    $data .= '<tr>
                                <td > ' . $record['id'] . '</td >
                                <td > ' . $record['name'] . ' </td >
                                <td > ' . $record['amount'] . '/= TK </td >
                                <td ><a href="http://localhost/simple-crud/edit.php/?userid='.$record['id'].'">Edit</a> | <a href="http://localhost/simple-crud/view.php/?userid='.$record['id'].'">Delete</a></td >
                            </tr >';
        }

        $data .= '</tbody >
                </table >

                    <ul class="pagination" style="float: right">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                    
                </div >
                </form>
            </div';

      echo $data;
    }
}

$objView= new View();
$objView->viewData();
