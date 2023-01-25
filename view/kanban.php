<?php
include_once "../controllers/register.php";
include_once "../controllers/task.php";
$to_do =  $obj->showTask("to_do");
$doing = $obj->showTask("doing");
$done = $obj->showTask("done");
if(isset($_SESSION['username']) == 0){
    header('Location: registre.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Nav.css">
    <link rel="stylesheet" href="css/styles.css" />
    <title>>Kanban Bord</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">TaskBoard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="board">
        <form class="d-flex justify-content-end m-3" >
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" style="width:30vw;">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <form id="todo-form">
            <input type="text" placeholder="New TODO..." name="todo" id="todo-input" />
            <input type="date" placeholder="Deadline" name="Deadline" id="Deadline">
            <button type="submit" >Add +</button>
        </form>

        <div class="lanes">
            <div class="swim-lane" id="todo-lane">
                <h3 class="heading">to_do</h3>
                <?php for($i=0;$i<count($to_do) ; $i++){ ?>
                <div class="task" draggable="true">
                    <input type="hidden" class="ID-TASK" value="<?= $to_do[$i]['ID_TASK']?>" >
                    <p><?= $to_do[$i]['TITLE']?></p>
                    <p><?php  echo $to_do[$i]['DATE']?></p>
                </div>
                <?php }?>
            </div>

            <div class="swim-lane">
                <h3 class="heading">doing</h3>
                <?php for($i=0;$i<count($doing) ; $i++){ ?>
                <div class="task" draggable="true">
                    <input type="hidden" class="ID-TASK" value="<?= $doing[$i]['ID_TASK']?>" >
                    <p><?= $doing[$i]['TITLE']?></p>
                    <p><?php  echo $doing[$i]['DATE']?></p>
                </div>
                <?php }?>
            </div>

            <div class="swim-lane">
                <h3 class="heading">done</h3>
                <?php for($i=0;$i<count($done) ; $i++){ ?>
                <div><i class="bi bi-trash"></i></div>
                <div class="task" draggable="true">
                    <input type="hidden" class="ID-TASK" value="<?= $done[$i]['ID_TASK']?>" >
                    <p><?= $done[$i]['TITLE']?></p>
                    <p><?php  echo $done[$i]['DATE']?></p>
                </div>
                <?php }?>
            </div>
        </div>
    </div>





    <script src="js/drag.js" defer></script>
    <script src="js/todo.js" defer></script>
    <script src="js/search.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>