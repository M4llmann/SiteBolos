<?php

if(!function_exists("protect")){

    function protect(){

        if(!isset($_SESSION))
            session_start();

            if(!isset($_SESSION['fornecedor']) || !is_numeric($_SESSION['fornecedor'])){
                header("Location: login_fornecedores.php");
            }
    }
}

?>