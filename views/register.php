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

<form id="form-register" class="form-signin">

    <br><br>
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="inputEmail" class="sr-only">User</label>
    <input type="text" name="user" id="user" class="form-control" placeholder="User" required="" autofocus="">
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
    <label for="inputPassword" class="sr-only">Repeat Password</label>
    <input type="password" name="repeat-password" id="repeat-password" class="form-control" placeholder="Repeat Password" required="">

    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

</form>
<script defer>
    
    $("#form-register").submit(function(e){
        e.preventDefault();//prevent submit

        var user = $('#user').val();
        var password = $('#password').val();
        var repeatpassword = $('#repeat-password').val();

        //no vacios
        if(user == '' || password == '' || repeatpassword == ''){
            alert('All fields are required!');
            return;
        }

        //verificar coincidencia password
        if(password != repeatpassword){
            alert('Password not match');
            return;
        }





        //ajax register
        var datos = $('#form-register').serialize();
        datos += '&accion=registerUser';
        datos += '&enjson=1';

        $.ajax({

            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',

            success: function (data) {

                alert(data.mensaje);

                if(data.registro > 0){

                    //redireccion
                    window.location.href = "signin.php";
                }

            },

            data: datos

        });


    });
</script>
</body>
</html>


