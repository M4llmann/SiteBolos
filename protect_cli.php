<?php

if(!function_exists("protect_cli")){

    function protect(){

        if(!isset($_SESSION))
            session_start();

            if(!isset($_SESSION['usuario']) || !is_numeric($_SESSION['usuario'])){
                header("Location: login.php");
            }
    }
}

?>