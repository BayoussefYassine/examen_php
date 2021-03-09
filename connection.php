<?php 
// echo "You're in";
class ConnectionClass {
   private $servername = "localhost";
   private $username = "root";
   private $password = "";
   private $dbname = "examen_php";

   // getting the connection from the db
   public function getConnection()
   {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $conn = null;
        }   
   }

   // select all from a table
   public function SelectAllFromTable($table)
   {
       $sql = "SELECT * FROM $table";
       $result = $this->getConnection()->query($sql)->fetchAll();
       return $result;
   }

   public function SelectWhereFromTable($table,$col, $value)
   {
       $sql = "SELECT * FROM $table WHERE $col = '$value' ";
       $result = $this->getConnection()->query($sql)->fetchAll();
       return $result;
   }

   // delete a row from table
   public function DeleteRowFromTable($table, $col, $value)
   {
       try{
            $sql = "DELETE FROM $table WHERE $col = ?";
            $stm = $this->getConnection()->prepare($sql);
            if($stm->execute(array($value))){
                return TRUE;
            }
            return FALSE;
        }catch(Exception $e){
            return FALSE;
        }
   }

//    inserting data into a table
   public function InsertRowIntoTable($table, $dic)
   {
    try {
        $row = array_values($dic);
        $names = implode(",",array_keys($dic));
        $marks = $this->getMarks($names);
        $sql = "INSERT INTO $table ($names) VALUES ($marks)";
        $stm = $this->getConnection()->prepare($sql);
        if($stm->execute($row)){
            return TRUE;
        }
        return FALSE;
        
    } catch (Exception $e) {
        return FALSE;
    }
   }

//    Updating data in a table 
   public function UpdateRowInTable($table, $dict, $cond, $value)
   {
       try {    
            $row = array_values($dict);
            array_push($row, $value);
            $columns = implode(" = ?, ",array_keys($dict));
            $columns .= " = ?";
            $sql = "UPDATE $table SET $columns WHERE $cond = ?";
            $stm = $this->getConnection()->prepare($sql);
            if($stm->execute($row)){
                return TRUE;
            }
            return FALSE;
        }catch(Exception $e){
            return FALSE;
        }

   }

   // getting how many marks do we need in a string.
   public function getMarks($str){
    $marks = explode(",", $str);    
    for($i = 0; $i < count($marks); $i++){
        $marks[$i] = "?";
    }
    $marks = implode(",", $marks);
    return $marks;
   }

   public function SelectWhereOperationFromTable($table,$col, $value,$op)
   {
       $sql = "SELECT * FROM $table WHERE $col $op '$value' ";
       $result = $this->getConnection()->query($sql)->fetchAll();
       return $result;
   }
   public function SelectWhereOperationFromTableParam($table,$col, $value,$op,$param)
   {
       $sql = "SELECT $param FROM $table WHERE $col $op '$value' ";
       $result = $this->getConnection()->query($sql)->fetchAll();
       return $result;
   }

}

// $stmt->bind_param("sss", $firstname, $lastname, $email);
/*
$pdo = new ConnectionClass();
$res = $pdo->SelectAllFromTable("user");
foreach($res as $user){
    echo "<h2>{$user['idUser']}, {$user["username"]}, {$user["password"]}</h2>";
}
if($pdo->DeleteRowFromTable("user", "idUser", 17)){
    echo "Done";
}else {
    echo "Nop";
}
$user = "update 3";
$password = "update 3";
$dict = ["username" => $user,
         "password" => $password];

if($pdo->UpdateRowInTable("user", $dict, "idUser", 19)){
    echo "done";
}else {
    echo "not done";
}

$res = $pdo->SelectAllFromTable("user");
foreach($res as $user){
    echo "<h2>{$user['idUser']}, {$user["username"]}, {$user["password"]}</h2>";
}*/

?>