<?php
    if(isset($_GET["errors"])){
        $errors = json_decode($_GET["errors"], true);
    }
    if(isset($_GET["old"])){
        $old_data = json_decode($_GET["old"], true);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head> 
<body>
<div class="container border border-3 w-25 ">
    <form action="insert.php" method="Post" enctype="multipart/form-data" >
              <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="name" class="form-control" name="name" value="<?php if(isset($old_data['name'])) echo $old_data['name']; ?>">
        <span class="text-danger"> <?php if(isset($errors['name'])) echo $errors['name']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control"
               value="<?php if(isset($old_data['email'])) echo $old_data['email']; ?>"
               name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name='password'
               value="<?php if(isset($old_data['password'])) echo $old_data['password']; ?>"
               id="exampleInputPassword1">
        <span class="text-danger"> <?php if(isset($errors['password'])) echo $errors['password']; ?> </span>
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
        <input type="file" name="image"  class="form-control  w-100" id="image">
    </div>
    <button type="submit" class="btn btn-primary ">Register </button> 
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>