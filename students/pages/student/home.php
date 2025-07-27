<?php
require_once 'includes/ConnectDb.php';
include_once "includes/navbar.php";
$connect = new ConnectDb();


// Call Delete Function
if(isset($_POST['id'])){
    $id = $_POST['id'];
    // var_dump($id);
    $connect->Delete('students' , $id);
     echo '<div class="alert alert-danger" role="alert">
          Deleted Success!!!!
        </div>';
}
// Call Select Funcition
$data = $connect->select("students");
//    var_dump($data);
        if($data){
           echo '<div class="container alert alert-primary" role="alert">
          Successfull Data Selected!!!!
        </div>';
        }else{
            echo '<div class="alert alert-danger" role="alert">
          No Selected!
        </div>';
        }

        
        
        ?>

<div class="container my-5">
  <h2 class="fw-bold mb-3">All Student</h2>
  <button class="btn btn-primary">
    <a class="nav-link active" aria-current="page" href="<?=BASE_PATH?>/student/add"><i class="fa-solid fa-plus"></i> Add New Student</a>
  </button>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Age</th>
        <th scope="col">Class Room</th>
        <th scope="col">Added By</th>
        <th scope="col">Delete</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
      
      <?php foreach($data as $key=>$value){ 
        $singleUser = $connect->selectOne('users' , $value['user_id']);
        $singleClass = $connect->selectOne('class_room' , $value['class_id']);


        
        ?>
        <tr>
          <th scope='row'><?= $key + 1?></th>
          <td><?=$value['first_name']?></td>
        <td><?=$value['last_name']?></td>
        <td><?=$value['email']?></td>
        <td><?=$value['age']?></td>
        <td><?=$singleClass['class_name']?></td>
        <td><?=$singleUser['name']?></td>
     <td>
             <form method="POST" onsubmit="return confirm('Are You Sure Want To Delete?')">
          <input type="hidden" name="id" value="<?=$value['id']?>">
               <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Delete</button>
               <!-- <i class="fa-solid fa-trash"></i> -->
            </form>
            <td>
              <a href="/first_php/students/pages/student/edit?id=<?php echo $value['id'] ?>"
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