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

<form id="form-signin" class="form-signin">
    <!--
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    -->
    <br><br>
    <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="user" id="user" class="form-control" placeholder="Email address" required="" autofocus="">

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

    <!--
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    -->
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <!--
    <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    -->
</form>
<script defer>
    $("#form-signin").submit(function(e){
        e.preventDefault();//prevent submit

        var user = $('#user').val();
        var password = $('#password').val();


        //no vacios
        if(user == '' || password == '' ){
            alert('All fields are required!');
            return;
        }

        //ajax login
        var datos = $('#form-signin').serialize();
        datos += '&accion=loginUser';
        datos += '&enjson=1';

        $.ajax({

            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',

            success: function (data) {

                alert(data.mensaje);

                if(data.login){
                    //redireccion
                    window.location.href = "index.php";
                }

            },

            data: datos

        });


    });
</script>
</body>
</html>


