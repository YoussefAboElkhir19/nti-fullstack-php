<?php
require_once 'includes/ConnectDb.php';
include_once "includes/navbar.php";
  $connect = new ConnectDb;
  //  if(isset($_SESSION['name'])){
  //                echo "<h1 >✅ Welcome By session  " .$_SESSION['name'] ."</h1>";
  //                echo "<h1 >✅ Welcome cookies  " .$_COOKIE['name'] ."</h1>";
  //             } else{
  //               echo "<h1 class='alert alert-danger mt-3' role='alert'>Please Register!!!</h1>";
  //             }

  // echo "Connected successfully";
  if(isset($_POST['first_name'])){
  // echo "Connect object";
  $queryDb = $connect->insert($_POST , "students");
  // var_dump($connect);
  if($queryDb){
   echo '<div class="alert alert-primary" role="alert">
        Successfull Data Inserted!!!!
       </div>';
  }else{
    echo '<div class="alert alert-primary" role="alert">
          Faild Data Inserted!!!!
          </div>';
  }
}
echo "<hr/>" ;

// $sql = "INSERT INTO students(first_name , last_name , email , age) values ('Ali' , 'Ali' , 'Ali@gmail.com' , 33 )" ;
// $conn->query($sql);
$classies = $connect->select("class_room");
?>




    <div class="container mt-5">
          <h2 class="fw-bold mb-3">Add New Student</h2>

        <form  method="POST">
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name </label>
            <input  name="first_name"  type="firstnaem" class="form-control" id="firstname" aria-describedby="emailHelp">
            
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input name="last_name" type="lastname" class="form-control" id="lastname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1"   class="form-label">Email address</label>
    <input name="email" type="email"  class="form-control" id="exampleInputEmail1"   aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">Age</label>
    <input name="age" type="number"  class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">class room</label>
    <!-- name da mohm gdan da ely byshaor 3la colum DB lazm yb2a nfs name in DB  -->
    <select name="class_id" id="" class="form-control">
      <?php
      foreach($classies as $class){
        ?>

         <option value=<?=$class['id']?> >
        <?=$class['class_name']?>
        </option>
        <?php
      }
      ?>
    </select>
  </div>
    <input name="user_id" type="hidden" value="<?=$_SESSION['user_id']?>"  class="form-control" id="exampleInputPassword1">
    
    <button type="submit" class="btn  btn-primary">Submit</button>
  </form>
  
</div>


  </div>

<?php
require_once "includes/Footer.php";
