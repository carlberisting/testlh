<?php

session_start();

if(!isset($_SESSION['login_session'])) {
    header("Location: index.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <script src="../resources/js/jquery.min.js"></script>
    <script src="../resources/js/popper.min.js"></script>
    <script src="../resources/js/jquery.min.js"></script>
    <style>
        .form-signin{
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;

        }
    </style>
</head>
<body class="text-center">

<form id="form-changepassword" class="form-signin">
    <!--
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    -->
    <br><br>
    <h1 class="h3 mb-3 font-weight-normal">Change Password</h1>

    <label for="inputPassword" class="sr-only">Old Password</label>
    <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Old Password" required="">
    <br>

    <label for="inputPassword" class="sr-only">New Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required="">
    <label for="inputPassword" class="sr-only">Repeat New Password</label>
    <input type="password" name="repeat-password" id="repeat-password" class="form-control" placeholder="Repeat New Password" required="">
    <!--
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    -->
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
    <!--
    <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    -->
</form>
<script defer>
    $("#form-changepassword").submit(function(e){
        e.preventDefault();//prevent submit

        var oldpassword = $('#oldpassword').val();
        var password = $('#password').val();
        var repeatpassword = $('#repeat-password').val();

        //no vacios
        if(oldpassword == '' || password == '' || repeatpassword == ''){
            alert('All fields are required!');
            return;
        }

        //verificar coincidencia password
        if(password != repeatpassword){
            alert('New Password not match');
            return;
        }


        //ajax register
        var datos = $('#form-changepassword').serialize();
        datos += '&accion=changePasswordUser';
        datos += '&enjson=1';

        $.ajax({

            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',

            success: function (data) {

                alert(data.mensaje);

                if(data.actualizo > 0){


                    window.location.href = "index.php";
                }

            },

            data: datos

        });


    });
</script>
</body>
</html>


