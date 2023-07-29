<?php
    if(isset($_GET["errors"])){
//        var_dump($_GET);
        $errors = json_decode($_GET["errors"], true);
       var_dump($errors);
    }
    $id = $_GET["id"];
    $data=  file('users.txt');

    foreach ($data as $index=>$user){
        $user_data = explode(':', $user);
        if($user_data[0]==$id){
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container border border-2 w-25">
    <form action="edituser.php" method="Post">
        <input name="id" type="hidden" value="<?php echo  @$user_data[0] ; ?> ">
              <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control"
               value="<?php echo  @$user_data[1] ; ?>"
               name='firstname' id="firstname">
        <span class="text-danger"> <?php if(isset($errors['firstname'])) echo $errors['firstname']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control"
        value="<?php  echo $user_data[2]; ?>"
               name='lastname' id="lastname">
        <span class="text-danger"> <?php if(isset($errors['lastname'])) echo $errors['lastname']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control"
        value="<?php  echo $user_data[3]; ?>"
               name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password"   value="<?php  echo $user_data[4]; ?>"
               class="form-control  w-100" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" name="adress"   value="<?php  echo $user_data[5]; ?>"
               class="form-control  w-100" id="adress">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
<?php 
// $skills = explode(",", $user_data[6]);
// foreach( $skills as $i=>$skill) {
//     var_dump($skill[$i]);
// }

?>
    <div>
        <label for="skills">skills</label> <br>
        <input type="checkbox"   name="skills[]">
        <label> php</label> <br>
        <input type="checkbox"  value="mysql" name="skills[]">
        <label> mysql</label>
        <input type="checkbox" VALUE="cloud"  name="skills[]">
        <label>cloud</label> <br>
    </div> <br>
    <div>
        <label for="Gender">Gender</label> <br>
        <input type="radio" value=" <?php if(isset($old_data['Gender'])) echo $old_data['Gender']; ?>"  name="Gender">
        <label> male</label> <br>
        <input type="radio"  value=" <?php if(isset($old_data['Gender'])) echo $old_data['Gender']; ?>" name="Gender">
        <label> female</label>
        <span class="text-danger"> <?php if(isset($errors['Gender'])) echo $errors['Gender']; ?> </span>
        <p class="text-danger"> <?php if(isset($errors['Gender'])) echo $errors['Gender']; ?> </p>
    </div> <br>
    <div>
        <select class="custom-select w-75"  name="country" >
            <option selected>Country</option>
            <option value="egypt" >Egypt</option>
            <option value="germany">germany</option>
            <option value="America">America</option>
          </select>
        </div> <br> 

        <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" name="username"
                   class="form-control  w-100" id="username">
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">department</label>
            <input type="text" name="department"
                   class="form-control  w-100" id="department" >
        </div>
    <div>
        <label for="Hoppys"> Hoppys</label> <br>
        <input type="checkbox" VALUE="reading"  name="hoppy[]">
        <label> Reading</label> <br>
        <input type="checkbox"  value="writing" name="hoppy[]">
        <label> writing</label>

    </div> <br>

    <button type="submit" class="btn btn-primary">submit</button>
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php

            break;
}
}
?>

