<?php
require_once '../../includes/ConnectDb.php';
include_once "../../includes/navbar.php";
$connect = new ConnectDb();


$single_subject = $connect->selectOne('academic_subject', $_GET['id'] );

if(isset($_POST['subject_name'])){
    $smt = $connect->update('academic_subject',$_POST,$single_subject['id']);
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
        <h2>Edit Class, <?=$single_subject['subject_name']  ?></h2>
    <div>
    <form  method="POST">
    <div class="mb-3">
    <label for="subject_name" class="form-label">Class Name</label>
    <input  name="subject_name"  type="text" class="form-control" id="firstname" value="<?= $single_subject['subject_name'] ?>" aria-describedby="emailHelp">
    
    </div>
   


<button type="submit" class="btn btn-primary">Update</button>
</form>
</div>



</div>
 <?php
}else{
    echo "Please Login !!!!!";
}

require_once "../../includes/Footer.php";
