<?php

include 'connect_to_db.php';

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
echo "<div class='container'> ";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    // var_dump($id);

    try{
        $db = connect_to_db();
        if($db){
            $select_query= "Select * from students where id=:id";
            $stmt = $db->prepare($select_query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
            //    var_dump($row);
            }else{
                header("Location:datatable.php");
            }
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}else{
    exit;
}

?>
<h3> Update student <?php  echo $row['Name'];?> </h3>
<div class="container border border-3 w-25 ">
    <form action="update.php?id=<?php echo $row['ID'] ?>" method="Post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control"
              value="<?php echo $row['Name']; ?>"
               name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
           <label for="name" class="form-label">Email</label>
           <input type="email" class="form-control" name="name" 
             value="<?php echo $row['Email']; ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name='password'
        value="<?php echo $row['password']; ?>"
               id="exampleInputPassword1">
    </div>
    <div>
    <label for="room"> Room no </label>
<select class="form-select" name ="room" value="<?php echo $row['room']; ?>" >
  <option value="Application1">Application1</option>
  <option value="Application2">Application2</option>
  <option value="Cloud">Cloud</option>
</select>
</div>
    <div class="mb-3">
        <label class="form-label">profile picture </label>
        <input type="file" name="image"  class="form-control  w-100" id="image" src=" <?php echo $row['image']; ?>"   w-100 id="image"  >
    </div>
    <button type="submit" class="btn btn-primary ">Update </button> 
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>





