<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>All users  </h1>";

try{

    $users=  file("users.txt");
    echo "<table class='table'> <tr> 
      <th> id</th>
        <th> Email</th>  
        <th> Name </th> 
        <th> Password </th> 
        <th> Image Path </th>
        <th> Image </th>
        <th> Edit </th> <th> Delete</th>
        </tr>";
    foreach ($users as $user){
        echo '<tr>';
           $users_data = explode(':', $user);
           foreach ($users_data as $info){
               echo "<td> {$info}</td>";
           }
        echo" 
        <td> <img width='100' height='100'  src='{$users_data[4]}'> </td>
            <td> <a class='btn btn-warning'  href='updateuserform.php?id={$users_data[0]}'> Edit</a></td>
            <td> <a class='btn btn-danger' href='deleteuser.php?id={$users_data[0]}'> Delete</a></td>
        </tr>";
    }
    echo "</table>";
}catch (Exception $e){
    echo $e->getMessage();
}
?>
<a href="adduserform.php" class="btn btn-primary">Add new user </a>
