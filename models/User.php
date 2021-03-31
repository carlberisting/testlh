<?php

require_once ('../config/ConectionPDO.php');

class User
{
    public $id;
    public $user;
    public $password;
    public $status;
    public $conexion;

    function __construct() {

        $Conexion =  new ConectionPDO();
        $this->conexion = $Conexion->openConnection();
    }

    function registerUser(){

        try{

            $sql    = "INSERT INTO users(user, password, status)
                               VALUES(:user, :password, :status)";

            $stmt   = $this->conexion->prepare($sql);

            $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
            $stmt->bindParam(':password',$this->password, PDO::PARAM_STR);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_INT);
            $stmt->execute();


            if($stmt->rowCount() > 0){

                return $this->conexion->lastInsertId();


            }else{

                return 0;

            }


        }catch (PDOException $e){

            die($e);
        }

    }


    function updatePasswordUser(){

        try{

            $sql    = "UPDATE users set password = :password where id = :id";

            $stmt   = $this->conexion->prepare($sql);


            $stmt->bindParam(':password',$this->password, PDO::PARAM_STR);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $resultado = $stmt->execute();


            if($resultado){

                return 1;


            }else{

                return 0;

            }


        }catch (PDOException $e){

            die($e);
        }

    }

    function consultarUsuario(){

        try{

            $parameters = [];

            $sql    = "
                    SELECT *
                    FROM users
                    WHERE 1 = 1                                  
                    ";


            if($this->id){

                $sql.= " AND id = ? ";
                $parameters[] = $this->id;
                //$sql.= " AND id = ".$this->id;
            }

            if($this->user){

                $sql.= " AND user = ? ";
                $parameters[] = $this->user;
                //$sql.= " AND user = ".$this->user;
            }

            if($this->status){

                $sql.= " AND status = ? ";
                $parameters[] = $this->status;
                //$sql.= " AND status = ".$this->status;
            }


            $stmt   = $this->conexion->prepare($sql);
            $stmt->execute($parameters);


            if($stmt->rowCount() > 0){

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $this->id       = $row['id'];
                $this->user     = $row['user'];
                $this->password = $row['password'];
                $this->status   = $row['status'];

                return 1;

            }else{

                return 0;

            }



        }catch (PDOException $e){

            return $e;
        }

    }






}