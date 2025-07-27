<?php
require_once 'includes/ConnectDb.php';
include_once "includes/navbar.php";
$connect = new ConnectDb();

// Check if login Or not to have a policy to Delte
if(isset($_POST['id'])){
    if($_SESSION['user_id']){
        $id = $_POST['id'];
        $connect->delete("teachers" , $id);
    }else{
        echo "Donont assess to Delete";
    }
}
?>

 <div class="container my-5">
    <h2 class="fw-bold mb-3">All Teachers</h2>
    <button class="my-4 btn btn-primary">
        <a class="nav-link active" aria-current="page" href="<?=BASE_PATH?>/teachers/add"><i class="fa-solid fa-plus"></i> Add New Teacher</a>
    </button>
    <table class="table table-striped">
      <thead>
        <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Exeperience</th>
      <th scope="col">Created By</th>
      <th scope="col">Academic_subject</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>

      <?php 
      $data = $connect->select("teachers");
      
      
      foreach($data as $key=>$value){ 
        
        
        ?>
        <tr>
          <th scope='row'><?= $key + 1?></th>
          <td><?=$value['full_name']?></td>
          <td><?=$value['experience']?></td>
          <!-- user_id -->
          <?php
          $id = $value['user_id'];

         $singleUser = $connect->selectOne("users",$id) ;
        //  var_dump($singleUser["name"]);
        $user_name = $singleUser['name'];
         
         ?>
        <td><?=$singleUser["name"]?></td>
          <!-- Academic_subject_id -->
          <?php
          $id = $value['Academic_subject_id'];

         $singleSubject = $connect->selectOne("academic_subject",$id) ;
        //  var_dump($singleUser["name"]);
        $subject_title = $singleSubject['subject_name'];
         
         ?>
        <td><?=$singleSubject["subject_name"]?></td>
         
     <td>
             <form method="POST" onsubmit="return confirm('Are You Sure Want To Delete?')">
               <input type="hidden" name="id" value="<?=$value['id']?>">
               <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Delete</button>
               <!-- <i class="fa-solid fa-trash"></i> -->
            </form>
           <td>
    <a href="students/pages/teachers/edit?id=<?php echo $value['id'] ?>"
       class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
</td>

    </td>


    </tr>
        <?php }?>
    
    
  </tbody>
</table>

  </div>

<?php

include_once "includes/Footer.php";