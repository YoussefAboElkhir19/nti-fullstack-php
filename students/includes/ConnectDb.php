<?php



class ConnectDb{


    const host = 'localhost';       // MySQL server (check your Workbench)
const user = 'root';            // MySQL username
const password = '';            // MySQL password (default is empty on local XAMPP)
const database = 'iti';       // Your database name

public $conn;
public  function __construct(){

    $this->conn = new mysqli(self::host, self::user, self::password, self::database);
}

// // Check connection
// if ($this->conn->connect_error) {
//     die("Connection failed: " . $this->conn->connect_error);
// }
// 1- Insert Function
public function insert($post , $tableName){
    // var_dump($post) // $fields=[];
  $values =[];
  $fields =[];
  foreach($_POST as $key=>$value){
    $fields[] = $key;
    // to make values as string
    $values[] = "'".$value."'";
  }
    //   var_dump($fields);
       // function implode(separator , array needed     converted) convert array to string
      $fieldString = implode(',' , $fields);
      // echo $fieldString ;
      $valueString = implode(',' , $values);
    //   echo $valueString ;
      $sql = "INSERT INTO $tableName ($fieldString)     values ($valueString)";
    //   echo "SQL Insert".$sql ;
      echo "<hr/>";
      // to insert data input in Database
      $queryDb = $this->conn->query($sql);
      if($queryDb){
        return true;
      }else{return false;}

}

// 2- Select Function 
public function select($tableName){
    $sql = "SELECT * FROM $tableName";
    $queryDb = $this->conn->query($sql);
    // var_dump($queryDb);
    if($queryDb->num_rows > 0){
        $data = $queryDb->fetch_all(MYSQLI_ASSOC);
        return $data;
    }else{
        return [];
    }
}
// 2- Select Function  OneStudent
public function selectOne($tableName , $id){
    $sql = "SELECT * FROM $tableName WHERE id=$id LIMIT 1";
    $queryDb = $this->conn->query($sql);
    // var_dump($queryDb);
    if($queryDb->num_rows > 0){
        $dataOfRow = $queryDb->fetch_assoc();
        return $dataOfRow;
    }else{
        return [];
    }
}
// 3- Delete Function
public function Delete($tableName , $id ){
    $sql = "DELETE FROM $tableName WHERE id= $id";
    // echo $sql;
    $this->conn->query($sql);

}
// 4- Update Function 
public function update($tableName , $postArray , $id)  {
    // var_dump($postArray);
    $setField=[];
    foreach($postArray as $key=>$value){
        $setField[]="$key='$value'";
        echo "$key='$value'";

    }
    $setFieldSreing = implode(',' ,$setField );
    $sql = "UPDATE $tableName SET $setFieldSreing WHERE id = $id";
    $smt = $this->conn->query($sql);
    if($smt){
        return true;
    }else{
        return false;
    }
}
// function in Check register user to can login
public function checkUser($name,$password){
    $sql = "SELECT * FROM users WHERE name='$name' AND password='$password' LIMIT 1";
    $queryDb = $this->conn->query($sql);
    // var_dump($queryDb);
    if($queryDb->num_rows > 0){
        $dataOfRow = $queryDb->fetch_assoc();
        return $dataOfRow;
    }else{
        return [];
    }

}
// function check email and name found in Db
public function checkIfUserExists($name, $email) {
$sql = "SELECT * FROM users WHERE name = ? OR email = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email); // s = string
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();

}
}
?>