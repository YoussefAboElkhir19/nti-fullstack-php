<?php
require_once 'includes/ConnectDb.php';
include_once "includes/navbar.php";

?>

<!-- <?php

if(isset($_SESSION['user_id'])){
?> -->
    <div class="container mt-5">
        <h2>Add new Subject</h2>
    <div>
    <form  method="POST">
    <div class="mb-3">
    <label for="subject_name" class="form-label">Subject Title</label>
    <input  name="subject_name"  type="text" class="form-control" id="subject_name" aria-describedby="emailHelp">
    
    </div>
   
    <div class="mb-3">
    <input name="user_id" type="hidden"  class="form-control" id="user_id"  
    value="<?php echo $_SESSION['user_id'] ?>" aria-describedby="emailHelp">
    
</div>


<button type="submit" class="btn  btn-primary">Submit</button>
</form>
</div>



</div>
 <?php
}else{
    echo "Please Login !!!!!";
}

?> 
<?php

$connect = new ConnectDb();
if(isset($_POST['subject_name'])){
$smt = $connect->insert($_POST ,"academic_subject");
// var_dump($smt);
if($smt){
    // echo " Added";
    header("location:".BASE_PATH."/subjects/show");
}else{
    echo "Error Not Added";
}
}
require_once "includes/Footer.php";
