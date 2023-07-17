<?php 
session_start();
define("USERNAME", 'john');
define("PASSWORD", 'secret');
?>

<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt formulario_conexion.php
 fecha 24-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel='stylesheet' type='text/css' href="../common.css"/>
    </head>
    <body>
        <?php
        
    if(isset($_POST["login"])){
        login();
    }elseif(isset($_GET["action"]) and $_GET["action"] == "logout"){
        logout();
    }elseif(isset($_SESSION["username"])){
        displayPage();
    }else{
        displayLoginForm();
    }    
        
    function login(){
        if(isset($_POST["username"]) and isset($_POST["password"])){
            if($_POST["username"] == USERNAME and $_POST["password"] == PASSWORD){
                $_SESSION["username"] = USERNAME;
                session_write_close();
                header("Location: formulario_conexion.php");
            }else{
                displayLoginForm("Sorry, that username/pasword could not be found. Please try again.");
            }
        }
    }
    
    function logout(){
        unset($_SESSION["username"]);
        session_write_close();
        header("Location: formulario_conexion.php");
    }
    
    function displayPage(){
        displayPageHeader();
    
        echo '<p>Welcome, <strong>'.$_SESSION["username"].'</strong>!You are currently logged in.</p>';
        echo '</body>';
        echo '<html>';
    }
    
    function displayLoginForm($message = ""){
        displayPageHeader();
        
        if($message) echo '<p class="error">'.$message.'</p>';
        echo'<form action="formulario_conexion.php" method="post">';
            echo '<div style="width: 30em;">';
            echo'<label for="username">Username</label>';
            echo'<input type="text" name="username" id="username" value="">';
            echo'<label for="password">Password</label>';
            echo'<input type="password" name="password" id="password" value="" >';
            echo'<div style="clear: both;">';
                echo'<input type="submit" name="login" value="login">';
            echo '</div>';
            echo'</div>';
        echo'</form>';
        echo'</body>';
        echo'</html>';   
    }
        
        
    function displayPageHeader(){   
        echo '<h1>A login/logout system</h1>';   
    }    
        
    
   