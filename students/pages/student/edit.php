<?php
require_once '../../includes/ConnectDb.php';
include_once "../../includes/navbar.php";
$connect = new ConnectDb();
            if(isset($_POST['first_name'])){
                // function update 
                $connect->update('students' , $_POST , $_GET["id"]);
                echo "<h2 class='text-center alert alert-success'>Update success</h2>";
            }
         if(isset($_GET["id"])){
            $row = $connect->selectOne('students' ,$_GET["id"] );
            if(!$row){
                echo "<h2 class='text-center mt-4 text-danger'>Not Found This  Id  " .$_GET['id']."</h2>";
                exit();
            }else{
            if(isset($_SESSION['name'])){
                  echo "<h1 >✅ Welcome  " .$_SESSION['name'] ."</h1>";
              } else{
                echo "<h1 class='alert alert-danger mt-3' role='alert'>Please Register!!!</h1>";
              }
        
        }
        // $singleUser = $connect->selectOne('class_room' ,$_GET['class_id'] );
          ?>
    
        <div class="container mt-5">
            <div>
            <h2>Edit Student</h2>
            <form  method="POST">
                <div class="mb-3">
            <label for="firstname" class="form-label">First Name </label>
            <input value="<?=$row['first_name']?>"  name="first_name"  type="firstnaem" class="form-control" id="firstname" aria-describedby="emailHelp">
            
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Last Name</label>
              <input value="<?=$row['last_name']?>" name="last_name" type="lastname" class="form-control" id="lastname" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1"   class="form-label">Email address</label>
                <input value="<?=$row['email']?>" name="email" type="email"  class="form-control" id="exampleInputEmail1"   aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1"  class="form-label">Age</label>
                <input value="<?=$row['age']?>" name="age" type="age"  class="form-control" id="exampleInputPassword1">
            </div>
           
          
            <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">class room</label>
    <!-- name da mohm gdan da ely byshaor 3la colum DB lazm yb2a nfs name in DB  -->
    
    <select name="class_id" id="" class="form-control">
      <?php
      $classies = $connect->select("class_room");

      foreach($classies as $class){
        ?>

         <option <?= $row['class_id'] == $class['id'] ? "selected" :""  ?>  value=<?=$class['id']?> >
        <?=$class['class_name']?>
        </option>
        <?php
      }
      ?>
    </select>
  </div>
    <input name="user_id" type="hidden" value="<?=$_SESSION['user_id']?>"  class="form-control" id="exampleInputPassword1">
            
            <button type="submit" class="btn  btn-primary">Update</button>
            </form>
        </div>
    
</div>
<?php } 
else{
    echo "Error Miss Id!!!!!!!!!";
}
?>


<?php
require_once "../../includes/Footer.php";
