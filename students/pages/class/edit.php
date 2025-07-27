<?php
require_once '../../includes/ConnectDb.php';
include_once "../../includes/navbar.php";
$connect = new ConnectDb();


$single_class_room = $connect->selectOne('class_room', $_GET['id'] );

if(isset($_POST['class_name'])){
    $smt = $connect->update('class_room',$_POST,$single_class_room['id']);
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
        <h2>Edit Class, <?=$single_class_room['class_name']  ?></h2>
    <div>
    <form  method="POST">
    <div class="mb-3">
    <label for="firstname" class="form-label">Class Name</label>
    <input  name="class_name"  type="text" class="form-control" id="firstname" value="<?= $single_class_room['class_name'] ?>" aria-describedby="emailHelp">
    
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Role</label>
    <input name="role" type="text"  value="<?= $single_class_room['role'] ?>" class="form-control" id="lastname" aria-describedby="emailHelp">
    
    </div>
    <div class="mb-3">
    <input name="user_id" type="hidden"  class="form-control" id="user_id"  
    value="<?php echo $_SESSION['user_id'] ?>" aria-describedby="emailHelp">
    
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
