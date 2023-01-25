<?php
include_once "connect.php";
class user extends Database{
    public function log($email,$password){
        $sql = "SELECT * FROM users WHERE EMAIL = ?  AND PASSWORD = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email,$password]);
        $names = $stmt->fetchAll();
        if(count($names) == 1)
        {
            $_SESSION['email'] = $names[0]['EMAIL'];
            $_SESSION['ID_user'] = $names[0]['ID_USER'];
            $_SESSION['username'] = $names[0]['USERNAME'];
            return $names;
        }else{
            return 0;
        }
    }

    public function signup($email,$password,$username){
        $sql = "INSERT INTO users (email ,password,username )VALUES (? , ? , ? )";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email,$password,$username]);
    }

    public function logout(){
        session_destroy();
    }
    public function checklogin(){
        if(isset($_SESSION['ID_user'])){
            return 1;
        }
        return 0;
    }
}
?>