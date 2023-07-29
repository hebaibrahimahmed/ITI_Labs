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
    <form action="edituser.php" method="Post" enctype="multipart/form-data" >
        <input name="id" type="hidden" value="<?php echo $id ; ?> ">
              <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control"
               value="<?php echo  @$user_data[2] ; ?>"
               name='name' id="name">
        <span class="text-danger"> <?php if(isset($errors['name'])) echo $errors['name']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control"
        value="<?php  echo $user_data[1]; ?>"
               name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password"   value="<?php  echo $user_data[3]; ?>"
               class="form-control  w-100" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="passwd" class="form-label">confirm Password</label>
        <input type="password" name="passwd" class="form-control  w-100" id="passwd">
    </div>
    <div>
    <label for="room"> Room no </label>
<select class="form-select" name ="room">
  <option value="Application1">Application1</option>
  <option value="Application2">Application2</option>
  <option value="Cloud">Cloud</option>
</select>
</div>
    <div class="mb-3">
        <label for="exit" class="form-label">Ext</label>
        <input type="text" name="exit" class="form-control  w-100" id="exit">
    </div>
    <div class="mb-3">
        <label class="form-label">profile picture </label>
        <input type="file" name="image"  class="form-control" src = "<?php echo $user_data['4'];?>" w-100 id="image">
    </div>

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

