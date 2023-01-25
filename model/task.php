<?php
include_once "connect.php";
class task extends Database{

    public function addTask($title,$deadline){
        $sql = "INSERT INTO tasks (TITLE ,DATE,STAT,ID_USER )VALUES (? , ? , ?, ? )";
        $stat = "to_do";
        // $id_user = $_SESSION['ID_user'];
        $id_user = 1;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$deadline,$stat,$id_user]);
        
    }

    public function deleteTask($id){
        $sql = "DELETE FROM tasks WHERE ID_TASK = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function updateTask($title,$deadline,$id){
        $sql = "UPDATE tasks SET TITLE = ? , DATE = ?  WHERE ID_TASK = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$deadline,$id]);
    }

    public function updateStat($STAT,$id){
        $sql = "UPDATE tasks SET STAT = ? WHERE ID_TASK = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$STAT,$id]);
    }

    public function showTask($stat){
        $sql = "SELECT * FROM tasks WHERE STAT = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$stat]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
?>