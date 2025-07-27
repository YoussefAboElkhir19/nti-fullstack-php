




<?php



require_once "ConnectDb.php";


$db = new ConnectDb();
// get post put delete
$request = $_SERVER['REQUEST_METHOD'];

if($request == "GET"){
    $sql = "SELECT * FROM students";
    $result = $db->conn->query($sql);
    if($result->num_rows > 0){
        $data= $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }else{
        echo json_encode(["message"=>"Error In fetch Data"]);
    }
}

    if($request == "POST"){
        $first_name = $_POST['first_name'];
        // echo $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $sql = "INSERT INTO students(first_name,last_name,email,age) VALUES ('$first_name','$last_name','$email',$age)";
        // var $sql;
        // exit();
        $result = $db->conn->query($sql);
        if($result){
            echo json_encode(['message'=>" Success Student Inserted"]);
        }else{
            echo json_encode(['message'=>"Faild Student Inserted"]);
            
        }
    }

    if($request == "DELETE"){
        // var_dump($_DELETE);
        // exit();
        parse_str(file_get_contents("php://input") , $_DELETE);
        if(isset($_DELETE['id']) ){

            $id = $_DELETE['id'];
            // echo $id;
            $sql = "DELETE FROM students WHERE id=$id";
            $result = $db->conn->query($sql);
            if($result){
                echo json_encode(['message'=>"Success Deleted"]);
            }
            else{
                echo json_encode(['message'=>"Error Deleted"]);
    
            }
        }
          else{echo json_encode(['message' => "Invalid id"]);
        }
    }