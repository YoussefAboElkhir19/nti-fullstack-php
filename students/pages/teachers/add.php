<?php
require_once 'includes/ConnectDb.php';
include_once "includes/navbar.php";
  $connect = new ConnectDb;

$subjects = $connect->select("academic_subject");
?>




    <div class="container mt-5">
          <h2 class="fw-bold mb-3">Add New Teacher</h2>

        <form  method="POST">
                  <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name </label>
                    <input  name="full_name"  type="text" class="form-control" id="full_name" aria-describedby="emailHelp">

                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">experience</label>
            <input name="experience" type="text" class="form-control" id="lastname" aria-describedby="emailHelp">

          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1"  class="form-label">Academic_subject</label>
            <!-- name da mohm gdan da ely byshaor 3la colum DB lazm yb2a nfs name in DB  -->
            <select name="Academic_subject_id" id="" class="form-control">
              <?php
              foreach($subjects as $subject){
                        ?>

                 <option value=<?=$subject['id']?> >
                <?=$subject['subject_name']?>
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

$connect = new ConnectDb();
if(isset($_POST['full_name'])){
$smt = $connect->insert($_POST ,"teachers");
// var_dump($smt);
if($smt){
    // echo " Added";
    header("location:".BASE_PATH."/teachers/show");
}else{
    echo "Error Not Added";
}
}
require_once "includes/Footer.php";
