<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Login
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="css/Nav.css">
</head>
</head>

<body>

    <!-- <nav class="navbar sticky-top navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="..image/Teal and Black Simple Letter Logo (1).png">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="registre.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->


    <form action="../controllers/register.php" method="post">
        <table class="login_table">
            <tr>
                <td class="text">Username</td>
                <td><input class="insert" type="email" name="email" id="username"></td>
            </tr>



            <tr>
                <td class="text">Password</td>
                <td><input class="insert" type="text" name="password" id="password"></td>
            </tr>
            <tr>
                <!-- <td><input type="checkbox" name="keep" value="true"> <small>Keep Me</small></td> -->
                <div class="goBack">
                    <td><input type="submit" value="Login" name="SUBMITLOGIN" class="submit"></td>
                    <!-- <a  class="home" href="kanban.php">Go Back To Home</a> -->
                    <td><a href="kanban.php"><input type="button" value="Go Back To Home" class="back"></a></td>

                </div>
            </tr>

        </table>
    </form>
</body>

</html>