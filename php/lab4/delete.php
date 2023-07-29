<?php

include 'connect_to_db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
echo "<div class='container'> ";
echo "<h1>All students  </h1>";

// var_dump($_REQUEST);

if(isset($_GET['id'])){

    $id = $_GET['id'];
try{

    $db = connect_to_db();

    if($db){
        $_query= "delete from students where id=:id";
        $stmt = $db->prepare($_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $res = $stmt->execute();
        if($stmt->rowCount()){
            echo "deleted ";

            header("Location:datatable.php");
        }
    }
    }catch(Exception $e){
            echo $e->getMessage();
           }  
        }
    
    
?>