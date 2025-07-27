
<?php
require_once 'includes/ConnectDb.php';
include_once "includes/navbar.php";
$connect = new ConnectDb();
if(isset($_POST['id'])){
    if($_SESSION['user_id']){
        $id = $_POST['id'];
        $connect->delete("class_room" , $id);
    }else{
        echo "Donont assess to Delete";
    }
}

?>

 <div class="container my-5">
    <h2 class="fw-bold mb-3">All Class</h2>
    <button class="btn btn-primary">
        <a class="nav-link active" aria-current="page" href="class/add"><i class="fa-solid fa-plus"></i> Add New Class</a>
    </button>
    <table class="table table-striped">
      <thead>
        <tr>
      <th scope="col">#</th>
      <th scope="col">Class Name</th>
      <th scope="col">Role</th>
      <th scope="col">Create By</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>

      <?php 
      $data = $connect->select("class_room");
      
      
      foreach($data as $key=>$value){ 
        
        
        ?>
        <tr>
          <th scope='row'><?= $key + 1?></th>
          <td><?=$value['class_name']?></td>
          <td><?=$value['role']?></td>
          <!-- user_id -->
          <?php
          $id = $value['user_id'];

         $singleUser = $connect->selectOne("users",$id) ;
        //  var_dump($singleUser["name"]);
        $user_name = $singleUser['name'];
         
         ?>
        <td><?=$singleUser["name"]?></td>
     <td>
             <form method="POST" onsubmit="return confirm('Are You Sure Want To Delete?')">
          <input type="hidden" name="id" value="<?=$value['id']?>">
               <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Delete</button>
               <!-- <i class="fa-solid fa-trash"></i> -->
            </form>
            <td>
              <a href="/first_php/students/pages/class/edit?id=<?php echo $value['id'] ?>"
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