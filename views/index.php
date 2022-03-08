<?php

session_start();

//logeado
if(isset($_SESSION['login_session']) && $_SESSION['user_id_session'] > 0){

    $opciones_menu = '<li class="nav-item">
                        <a class="nav-link" href="changepassword.php">Change Password</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                      </li>';
}else{
    $opciones_menu = '<li class="nav-item">
                        <a class="nav-link" href="signin.php">Sign In</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                      </li>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->

    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <script src="../resources/js/jquery.min.js"></script>
    <script src="../resources/js/popper.min.js"></script>
    <script src="../resources/js/jquery.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">SITIO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <?php
                 echo $opciones_menu;
                ?>

            </ul>
        </div>
    </div>

</nav>






<div class="container">
    <h1>Section Heading</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
</div>


<div class="container">
    <h1>Section Heading</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
</div>


<div class="container">
    <h1>Section Heading</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
</div>


<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright © Carlos Andrade 2021</p>
    </div>
    <!-- /.container -->
</footer>
</body>
</html>


