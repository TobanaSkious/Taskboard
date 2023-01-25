<?php
include_once"../model/user.php";


$obj = new user();
if(isset($_POST['SUBMITLOGIN']) && isset($_POST['email']) && isset($_POST['password'])){
    $ab = $obj->log($_POST['email'],$_POST['password']);
    header('Location: ../view/kanban.php');
    exit;
}

// if(isset($_POST['SUBMITLOGIN']) && isset($_POST['EMAIL']) && isset($_POST['PASSWORD']) && isset($_POST['USERNAME'])){
//     $obj->signup($_POST['EMAIL'],$_POST['PASSWORD'],$_POST['USERNAME']);
// }


?>