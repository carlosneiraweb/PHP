<?php
    if(isset($_POST['sendInfo'])){ 
       storeInfo();
    } elseif(isset($_GET['action']) and $_GET['action'] == "forget"){
       forgetInfo();
    }else{
        displayPage();
    }

    function storeInfo(){
        
        if(isset($_POST['firstName'])){
            setcookie("firstName", $_POST["firstName"], time() + 60 * 60 * 24 * 365, "", "", false,true );
        }
        
    if(isset($_POST['location'])){
        setcookie("location", $_POST["location"], time() + 60 * 62 * 24 * 365, "", "", false, true);
    }
       echo 'nombre: '.$_POST["firstName"];
        header('Location:  recuerdame.php');
    
    }
    
    function forgetInfo(){
        setcookie("firstName", '', time() -3600, '', '', false, true);
        setcookie("location", '', time() -3600, '', '', false, true);
        header('Location: recuerdame.php');
    }
    
    function displayPage(){
      
        $firstName = (isset($_COOKIE["firstName"])) ? $_COOKIE["firstName"] : '';
        $location = (isset($_COOKIE["location"])) ? $_COOKIE["location"] : '';
   
   //fin displayPage()     
 
?>
<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt recuerdame.php
 fecha 18-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../common.css"/>
        <title></title>
    </head>
    <body>
        <h2>Remembering user information with cookies</h2>
        <?php
       
        if($firstName or $location){
            echo'<p>Hi,'.$firstName ? $firstName : 'visitor';
            echo $location ? "in $location"  : "";
            echo "cancion";
            echo '<p><a href="recuerdame.php?action=forget">Forget me!</a></p>';
            
        }else{
            
            echo '<form action="recuerdame.php" method="post">';
            echo'<div style="width: 30em;">';
                echo'<label for="firstName">What\'s your name? </label> ';
                echo'<input type="text" name="firstName" id="firstName" vale="">';
                echo'<label for="location">Where do you live?</label>';
                echo'<input type="text" name="location" id="location" value="">';
                
                    echo'<div style="clear: both;">';
                        echo'<input type="submit" name="sendInfo" value="sendInfo" >';
                    echo'</div>';
            echo'</div>';
            echo'</form>';
                
                
        }
        
    }   
        ?>
    </body>
</html>
