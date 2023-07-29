<?php
include 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
echo "<div class='container'> <br> <br> ";
echo "<h1>All students  </h1> <br> <br>";

try{
    $database=new Database("localhost", "root","","iti");
    $db=$database->connect_to_db();
    
    if($db){
       $data=$database->Selectall($db,"students");
    echo "<table class='table'> <tr> 
      <th> id</th>
        <th> Name </th> 
        <th> Email</th>  
        <th> Password </th> 
        <th> room no </th> 
        <th> Image Path </th>
        <th> Image </th>
        <th> Edit </th> <th> Delete</th>
        </tr>";
    foreach ($data as $row){
        echo "<tr>";
        foreach ($row as $element){
            echo "<td>{$element} </td>";
        }
        // var_dump($row);
        echo "  <td> <img width='100' height='100'  src='{$row['image']}'> </td>";
        echo " <td> <a href='updateform.php?id={$row['ID']}' class='btn btn-warning'> Edit </a> </td>";
        echo " <td> <a href='delete.php?id={$row['ID']}' class='btn btn-danger'> Delete </a> </td>";
        echo "</tr>";
    }
    }
    echo "</table>";
}catch (Exception $e){
    echo $e->getMessage();
}
?>
<a href="insertform.php" class="btn btn-primary">Add Student</a>
