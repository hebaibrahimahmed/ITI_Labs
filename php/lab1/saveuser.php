<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo"<h1> save user </h1>";


//==================================lab 1======================================================
//super global array 
// var_dump ($_REQUEST);

// $firstname = $_POST["firstname"];
// $lastname = $_POST["lastname"];
// $gender = $_POST["Gender"];
// $address = $_POST["address"];
// $username = $_POST["username"];
// $department = $_POST["department"];
// $skills = $_POST["skills"];


// if( $gender == "male" )
// {
//     echo"Thank You  Mr  $firstname $lastname","<br>";
// }
// else
// {
//     echo"Thank You Miss   $firstname $lastname","<br>";
// }

// echo"Please Review your data","<br>";

// echo"Name : $username","<br>";
// echo"Address :  $address","<br>";
// echo"Department  :  $department ","<br>";

// echo"Your skills : ";
// foreach ($skills as $value) {
//     echo "$value ";
//   }
  
//===================================lab2===========================================

// var_dump($_POST);
$useremail = $_POST["email"];
$userpassword = $_POST["password"];
$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$gender = $_POST["Gender"];
$address = $_POST["adress"];
$username = $_POST["username"];
$department = $_POST["department"];
$skills = $_POST["skills"];
$hoppys=$_POST["hoppy"];

// var_dump(empty($useremail) and isset($useremail));
// var_dump(empty($first_name) and isset($first_name));
// var_dump(empty($last_name) and isset($last_name));
// var_dump(empty($gender) and isset($gender));

$errors =[];

$formdata =[];

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

///=======================validation ============================
if(empty($useremail) and isset($useremail)){

    $errors['email']='email required';
}else{
    $formdata["email"]= $useremail;
}
if(empty($userpassword) and isset($userpassword)){

    $errors['password']='password required';
}else{
    $formdata["password"]= $userpassword;
}
if(empty($first_name) and isset($first_name)){

    $errors['firstname']='firstname required';

}if ($_POST["firstname"])  {
    $first_name = test_input($_POST["firstname"]);

    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {

    $errors ["firstname"] = "Only letters and white space allowed"; }
    }
else{
    $formdata["firstname"]= $first_name;

}if(empty($last_name) and isset($last_name)){

    $errors['lastname']='lastname required';

}if ($_POST["lastname"])  {
        $last_name = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
        $errors ["lastname"] = "Only letters and white space allowed"; } }
else{
    $formdata["lastname"]= $last_name;
}

if(empty($gender) and isset($gender)){

    $errors['Gender']='Gender required';
}else{
    $formdata["Gender"]= $gender;
}if($errors){
    $errors_str= json_encode($errors);
    $url="Location:adduserform.php?errors={$errors_str}";
    if($formdata){
        $old_data= json_encode($formdata);
        $url .="&old={$old_data}";
    }
    header($url);
}else {
    try {
   $skillsarray ="";
   foreach ($skills as $value) {
    $skillsarray .= $value ."," ;

   }
   $hoppies ="";
   foreach ($hoppys as $value) {
    $hoppies .= $value .',' ;
   }
        $fileobj = fopen('users.txt', 'a');
        $id = time();
        $user_data = "{$id}:{$_POST["firstname"]}:{$_POST["lastname"]} : {$_POST["email"]}: {$_POST["password"]} : {$_POST["adress"]}  : {$skillsarray} :{$_POST["Gender"]} : {$_POST["country"]} : {$_POST["username"]} : {$_POST["department"]} : {$hoppies} " . PHP_EOL;
        fwrite($fileobj, $user_data);
        fclose($fileobj);
        
        header('Location:usertable.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }  
}

?>
