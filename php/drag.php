<?php


function get_connection(){
    $dsn = "mysql:host=localhost;dbname=knbn";
    $user = "root";
    $password = "";
    $conn= new POO($dsn, $user, $password);
    return $conn;
}

function save_task($type, $task, $id){
    $conn = get_connection();
    if($id){
        $sql = "UPDATE kanban_board SET 'task'=? WHERE id=?";//create sql
        $query = $conn->prepare($sql); 
        $query->execute([$task, $id]);
        return $id;
    }else{
        $sql = "UPDATE kanban_board('task','type' VALUES (?,?)";//create sql
        $query = $conn->prepare($sql); 
        $query->execute([$task, $type]);
        return $conn->lastInsertId();
    }
}

function move_task($id, $position){
    $conn = get_connection();
        $sql = "UPDATE kanban_board SET 'type'=? WHERE id=?";//create sql
        $query = $conn->prepare($sql); 
        $query->execute([$position, $id]);
}
function get_task_type($type){
    $results = [];
    try {
        $conn = get_connection();
        $query = $conn->prepare("SELECT * from kanban_board WHERE type=? order by id desc");
        $query->execute([$type]);
        $results = $query->fetchAll();
    } catch (Exception $e){

    }
    return $results;
}

function get_task_id($id){
     $results = [];
    try {
        $conn = get_connection();
        $query = $conn->prepare("SELECT * from kanban_board WHERE id=? ");
        $query->execute([$id]);
        $results = $query->fetchAll();
        $results = $results[0];
    } catch (Exception $e){

    }
    return $results;
}

function show_tile($taskObject, $type=""){
  $baseUrl = $_SERVER["PHP_SELF"]."?shift&id=".$taskObject["id"]."&type=";
  $editUrl = $_SERVER["PHP_SELF"] . "?edit&id=".$taskObject["id"]."&type=". $type;
  $deleteUrl = $_SERVER["PHP_SELF"] . "?delete&id=".$taskObject["id"];
  $o = '<span class="board">'.$taskObject["task"].'
      <hr>
      <span>
        <a href="'.$baseUrl.'backlog">B</a> |
        <a href="'.$baseUrl.'pending">P</a> |
        <a href="'.$baseUrl.'progress">IP</a> |
        <a href="'.$baseUrl.'completed">C</a> |
      </span>
      <a href="'.$editUrl.'">Edit</a> | <a href="'.$deleteUrl.'">Delete</a>
      </span>';
  return $o;
}

function get_active_value($type, $content){
  $currentType = isset($_GET['type']) ? $_GET['type']:  null;
  if($currentType == $type){
    return $content;
  }
  return "";
}


$activeId = "";
$activeTask = "";


if(isset($_GET['shift'])){
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  $type = isset($_GET['type']) ? $_GET['type'] : null;
  if($id){
    move_task($id, $type);
    header("Location: ". $_SERVER['PHP_SELF']);
    exit();
  }else{
    // redirect take no action.
    header("Location: ". $_SERVER['PHP_SELF']);
  }
}

if(isset($_GET['edit'])){
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  $activeId = $id;
  $type = isset($_GET['type']) ? $_GET['type'] : null;
  if($id){
    $taskObject = get_task($id);
    $activeTask = $taskObject["task"];
  }
}

if(isset($_GET['delete'])){
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  if($id){
    try {
      $conn = get_connection();
      $query = $conn->prepare("DELETE from kaban_board WHERE id=?");
      $query->execute([$id]);
      header("Location: ". $_SERVER['PHP_SELF']);
    }catch (Exception $e){

    }
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $backlog = "";
  $pending = "";
  $progress = "";
  $completed = "";
  $taskId = isset($_POST['task']) ? $_POST['task'] : null;

  if(isset($_POST['save-backlog'])){
    $backlog = isset($_POST['backlog']) ? $_POST['backlog'] : null;
    save_task('backlog', $backlog, $activeId);

  }else if(isset($_POST['save-pending'])){
    $pending = isset($_POST['pending']) ? $_POST['pending'] : null;
    save_task('pending', $pending, $activeId);
  }else if(isset($_POST['save-progress'])){
    $progress = isset($_POST['progress']) ? $_POST['progress'] : null;
    save_task('progress', $progress, $activeId);
  }else if(isset($_POST['save-completed'])){
    $completed = isset($_POST['completed']) ? $_POST['completed'] : null;
    save_task('completed', $completed, $activeId);
  }
  if($activeId){
    header("Location: ". $_SERVER['PHP_SELF']);
  }

}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kanban Bord</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Nav.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/search.css" />

  </head>
  <body>


    <nav class="navbar sticky-top navbar-expand-lg bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item active">
              <a class="nav-link" href="../html/signup.html">Signup<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/login.html">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="search-wrapper">
    <label for="search">Search Users</label>
    <input type="search" id="search" data-search>
  </div>
  <div class="user-cards" data-user-cards-container></div>
  <template data-user-template>
    <div class="card">
      <div class="header" data-header></div>
      <div class="body" data-body></div>
    </div>
  </template>
    <div class="board">
      <form id="todo-form">
        <input type="text" placeholder="New TODO..." id="todo-input" />
        <button type="submit">Add +</button>
      </form>

      <div class="lanes">
        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">TODO</h3>
<!-- 
          <p class="task" draggable="true"></p>
          <p class="task" draggable="true"></p>
          <p class="task" draggable="true"></p> -->
        </div>

        <div class="swim-lane">
          <h3 class="heading">Doing</h3>

          <!-- <p class="task" draggable="true">Binge 80 hours of Game of Thrones</p> -->
        </div>

        <div class="swim-lane">
          <h3 class="heading">Done</h3>

          <!-- <p class="task" draggable="true">
            Watch video of a man raising a grocery store lobster as a pet
          </p> -->
        </div>
      </div>
    </div>
    <script src="../js/drag.js" defer></script>
    <script src="../js/todo.js" defer></script>
    <script src="../js/search.js" defer></script>
  </body>
</html>

