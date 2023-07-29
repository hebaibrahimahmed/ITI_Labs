<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
    echo "<h1> login Now </h1>";

    $useremail = $_POST["email"];
    $userpassword = $_POST["password"];
    $name=$_POST['name'];

    $errors =[];
    $formdata = [];


    if(empty($useremail) and isset($useremail)){
        $errors['email']='email required';

    }elseif(!filter_var($useremail,FILTER_VALIDATE_EMAIL)){
        $errors['email']='email is not valid';
    }
    else{
        $formdata["email"]= $useremail;
    }
    if(empty($userpassword) and isset($userpassword)){
    
        $errors['password']='password required';
    }elseif(strlen($userpassword)<=8 ){
    
        $errors['password']='password must be 8 letters';
    }elseif(preg_match("/[A-Z]/", $userpassword)){
    
        $errors['password']='can not contain capital letters';
    }
    else{
        $formdata["password"]= $userpassword;
    }

    if($errors){

        $errors_str= json_encode($errors);
   
        $url="Location:adduserform.php?errors={$errors_str}";
    
        if($formdata){
        $old_data= json_encode($formdata);
        $url .="&old={$old_data}";
        }
        header($url);
        }else {
            $is_login= false;

            $users= file("users.txt");

            foreach ($users as $index=>$user){

                echo $user, $index, '<br>';

                $users_data = explode(':', $user);

                if($users_data[1]==$useremail and $users_data[3]==$userpassword){

                    $is_login= true;

                header("Location:homepage.php");
                }
            }
            if($is_login){

                session_start();

                $_SESSION['user_email']=$useremail;

                $_SESSION['login']=true;

    
            }else{
                header("Location:login.php?error=invalidemailpassword");
            }
        }
    ?>