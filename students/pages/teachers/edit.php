<?php
require_once '../../includes/ConnectDb.php';
include_once "../../includes/navbar.php";
$connect = new ConnectDb();


$single_teacher = $connect->selectOne('teachers', $_GET['id'] );

if(isset($_POST['full_name'])){
    $smt = $connect->update('teachers',$_POST,$single_teacher['id']);
    if($smt){
        echo '<div class="alert alert-success" role="alert">
        Updated Success
        </div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
        Faild Update!!!!
        </div>';
    }
}
?>

<!-- <?php

if(isset($_SESSION['user_id'])){
    
    ?> -->
    <div class="container mt-5">
        <h2>Edit Class, <?=$single_teacher['full_name']  ?></h2>
    <div>
    <form  method="POST">
    <div class="mb-3">
    <label for="subject_name" class="form-label">Full Name</label>
    <input  name="full_name"  type="text" class="form-control" id="full_name" value="<?= $single_teacher['full_name'] ?>" aria-describedby="emailHelp">
    
    </div>
    <div class="mb-3">
    <label for="subject_name" class="form-label">Experience</label>
    <input  name="experience"  type="text" class="form-control" id="experience" value="<?= $single_teacher['experience'] ?>" aria-describedby="emailHelp">
    
    </div>
    <div class="mb-4">

        <select name="Academic_subject_id" id="" class="form-control">
            <?php
      $subjects = $connect->select("academic_subject");
      
      foreach($subjects as $subject){
          ?>

            <option 
            <?= $single_teacher['Academic_subject_id'] == $subject['id'] ? "selected" :""  ?> value=<?=$subject['id']?> >
            <?=$subject['subject_name']?>
            </option>
            <?php
      }
      ?>
    </select>
</div>
  </div>
    <input name="user_id" type="hidden" value="<?=$_SESSION['user_id']?>"  class="form-control" id="exampleInputPassword1">
    
  
   


<button type="submit" class="btn btn-primary">Update</button>
</form>
</div>



</div>
 <?php
}else{
    echo "Please Login !!!!!";
}

require_once "../../includes/Footer.php";
