<?php
include_once "../model/task.php";
$obj = new task();
if(isset($_POST['SUBMITADD']) && isset($_POST['TITLE']) && isset($_POST['DESCRIPTION']) && isset($_POST['STAT'])){
    $obj->addTask($_POST['TITLE'],$_POST['DESCRIPTION'],$_POST['STAT']);
}
if(isset($_POST['SUBMITUPDATE']) && isset($_POST['ID']) && isset($_POST['TITLE']) && isset($_POST['DESCRIPTION']) ){
    $obj->updateTask($_POST['TITLE'],$_POST['DESCRIPTION'],$_POST['ID']);
}
if(isset($_POST['DELETE']) && isset($_POST['ID'])){
    $obj->deleteTask($_POST['ID']);
}

if(isset($_GET['TITLE']) && isset($_GET['DEADLINE'])){
    $obj->addTask($_GET['TITLE'],$_GET['DEADLINE']);
    // echo "toubana";
}

if(isset($_GET['ID_TASK_STAT']) && isset($_GET['STAT'])){
    $obj->updateStat($_GET['STAT'],$_GET['ID_TASK_STAT']);
    
}

