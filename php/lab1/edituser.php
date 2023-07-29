<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>update user </h1>";

$user_id = $_POST["id"];
$users=  file('users.txt');

foreach ($users as $index=>$user){
    echo $user, $index, '<br>';
    $users_data = explode(':', $user);
    if($users_data[0]==$user_id){
      $users[$index]="{$user_id}: {$_POST["firstname"]}:{$_POST["lastname"]} : {$_POST["email"]}:{$_POST["password"]} : {$_POST["adress"]}  : {$skillsarray} :{$_POST["Gender"]} : {$_POST["country"]} : {$_POST["username"]} : {$_POST["department"]} : {$hoppies}"  . PHP_EOL;
        break;
    }
}

// var_dump($user_id)

$fileobj = fopen("users.txt", 'w');

foreach ($users as $user){

    fwrite($fileobj, $user);
}

fclose($fileobj); 

header("Location:usertable.php");

?>