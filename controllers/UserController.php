<?php

session_start();
require_once ('../models/User.php');

if(isset($_POST['accion'])){

    switch ($_POST['accion']){

        case 'registerUser':
            $UserController = new UserController();
            $UserController->registerUser($_POST['user'], $_POST['password'], $_POST['repeat-password'], $_POST['enjson']);
            break;

        case 'loginUser':
            $UserController = new UserController();
            $UserController->loginUser($_POST['user'], $_POST['password'], $_POST['enjson']);
            break;

        case 'changePasswordUser':
            $UserController = new UserController();
            $UserController->updatePasswordUser($_POST['oldpassword'], $_POST['password'], $_POST['repeat-password'], $_POST['enjson']);
            break;

    }
}


class UserController
{
    function registerUser($user, $password, $repeatpassword, $enjson){

        $registro = 0;
        if($password != $repeatpassword){
            $mensaje = 'Password not match!';

        }elseif(trim($user) == '' || trim($password) == ''){

            $mensaje = 'User and Password required!';
        }else{

            $User = new User();
            $User->user = $user;
            $User->password = password_hash($password, PASSWORD_DEFAULT);
            $User->status = 1;//default
            $registro = $User->registerUser();

            if($registro){
                $mensaje = 'Successful Register';
            }else{
                $mensaje = 'There was a mistake to Register';
            }

        }



        $array_salida = array('registro'=>$registro, 'mensaje'=>$mensaje);

        if($enjson){

            echo json_encode($array_salida);

        }else{

            return $array_salida;

        }
    }

    function loginUser($user, $password, $enjson){

        $registro = 0;
        $login = 0;

        if(trim($user) == '' || trim($password) == ''){

            $mensaje = 'User and Password required!';
        }else{

            $User = new User();
            $User->user = $user;
            $User->status = 1;//activos
            $resultado = $User->consultarUsuario();

            if($resultado){

                $hash = $User->password;

                if (password_verify($password, $hash)) {

                    $mensaje = 'Successful Login!';
                    $login = 1;

                    //session
                    $_SESSION['login_session'] = 1;
                    $_SESSION['user_id_session'] = $User->id;
                    $_SESSION['user_name_session'] = $User->user;

                } else {
                    $mensaje = 'Incorrect Credentials!';
                }
            }else{
                $mensaje = 'User not exits!';
            }

        }



        $array_salida = array('login'=>$login, 'mensaje'=>$mensaje);

        if($enjson){

            echo json_encode($array_salida);

        }else{

            return $array_salida;

        }
    }

    function updatePasswordUser($oldpassword, $password, $repeatpassword, $enjson){

        $actualizo = 0;
        $login = 0;

        if(trim($oldpassword) == '' || trim($password) == '' || trim($repeatpassword) == ''){

            $mensaje = 'All fields required!';

        }elseif($password != $repeatpassword){

            $mensaje = 'New Password not match!';

        }else{

            $User = new User();
            $User->id = $_SESSION['user_id_session'];
            $User->status = 1;//activos
            $resultado = $User->consultarUsuario();

            if($resultado){

                $hash = $User->password;

                if (password_verify($oldpassword, $hash)) {

                    //actualizar password
                    $User->password = password_hash($password, PASSWORD_DEFAULT);
                    $actualizo = $User->updatePasswordUser();

                    $mensaje = 'Password Update Succesuful!';

                } else {
                    $mensaje = 'Incorrect Old Password!';
                }
            }else{
                $mensaje = 'User not exits!';
            }

        }



        $array_salida = array('actualizo'=>$actualizo, 'mensaje'=>$mensaje);

        if($enjson){

            echo json_encode($array_salida);

        }else{

            return $array_salida;

        }
    }

}
