<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt hidden.php
 fecha 08-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" herf="../common.css"/>
        <title></title>
    </head>
    <body>
        <?php
        
        if(isset($_GET["step"]) and $_GET["step"] >= 1 and $_GET["step"] <=3 ){
            call_user_func("processStep" . (int)$_GET["step"]);
        }else{
            displayStep1();
        }
        
        function setValue($nombreCampo){
            if(isset($_GET[$nombreCampo])){
                return $_GET[$nombreCampo];
            }
        }
        
        function setChecked($nombreCampo, $valorCampo){
            if(isset($_GET[$nombreCampo]) and $_GET[$nombreCampo]== $valorCampo){
                return 'checked="checked"';
            }
        }
        
        function setSelected($nombreCampo, $valorCampo){
            if(isset($_GET[$nombreCampo]) and $_GET[$nombreCampo] == $valorCampo){
                return 'selected="selected"';
            }
        }
        
        function processStep1(){
            displayStep2();
        }
        
        
        function processStep2(){
            if(isset($_GET["submitButton"]) and $_GET["submitButton"] == "< Back" ){
                displayStep1();
            }else{
                displayStep3();
            }
        }
        
        function processStep3(){
            echo 'process3 '.$_GET["submitButton"].'<br>';
            if(isset($_GET["submitButton"]) and $_GET["submitButton"] == "< Back"){
                displayStep2();
            }else{
                displayStep3();
            }
        }
        
        
        function displayStep1(){
            echo '<h1>Member Signup: Step 1</h1>';
            //
            echo"<form action='hidden.php' method='get'>";
            //campos ocultos
           
                echo"<input type='hidden' name='step' value='1'>";
                echo"<input type='hidden' name='gender' value=".setValue('gender')." >".'<br>';
                echo"<input type='hidden' name='favoriteWidget' value=".setValue('favoriteWidget').">";
                echo"<input type='hidden' name='newsletter' value=".setValue('newsletter').">";
                echo"<input type='hidden' name='comments' value=".setValue('comments').">";
           
          
            echo "<label for='firstName'>FirstName</label>";
            echo"<input type='text' name='firstName' id='firstName' value=".setValue("firstName")." >";  
            echo"<label for='lastName'>Last Name</label>";
            echo"<input type='text' name='lastName' id='lastName' value=".setValue('lastName')." >";
                    echo"<div style='clear:'both';'>";
                    echo"<input type='submit' name='submitButton' id='nextButton' value='Next &gt;' >";
                    echo"</div>";
            echo"</form><br>";
        
        }
        
        function displayStep2(){
            
            echo'<h1>Member Signup: Step 2 </h1>';
            echo"<form action='hidden.php' method='get'>";
                echo"<div style='width: 30em;'>"; 
                    //campos ocultos
                    echo"<input type='hidden' name='step' value='2' />";
                    echo"<input type='hidden' name='firstName' value=".setValue('firstName')." >";
                    echo"<input type='hidden' name='lastName' value=".setValue('lastName')." >";
                    echo"<input type='hidden' name='newsletter' value".setValue('newsletter')." >";
                    echo"<input type='hidden' name='comments' value=".setValue('comments')." >";
                    
                    echo"<label for='favoriteWidget'>What's your favorite widget? *</label>";
                        echo"<select name='favoriteWidget' id='favoriteWidget' size='1'>";
                            echo"<option value='superWidget'".setSelected('favoriteWidget', 'superWidget').">The SuperWidget</option>";
                            echo"<option value='megaWidget'".setSelected('favoriteWidget', 'megaWidget').">MegaWidget</option>";
                            echo"<option value='wonderWidget'".setSelected('favoriteWidget', 'wonderWidget').">The WonderWidget</option>";
                        echo"</select>";
                        
                    echo"<div style='clear: both';>";
                        echo"<input type='submit' name='submitButton' id='backButton' value='Next &gt;'>";
                        echo"<input type='submit' name='submitButton' id='backButton' value='&lt; Back' style='margin-right: 20px;'>";
                    echo"</div>";
                echo"</div>";
            echo"</form>".'<br>';
          
        }
        
        
        function displayStep3(){
      
            echo"<h1>Member Signup: Step 3</h1>";
            
            echo"<form action='hidden.php' method='get'>";
            echo"<div style='width: 30em;'>";
                echo"<input type='hidden' name='step' value='3' />";
                echo"<input type='hidden' name='firstName' value=".setValue('firstName').">";
                echo"<input type='hidden' name='lastName' value=".setValue('lastName').">";
                echo"<input type='hidden' name='gender' value=".setValue('gender').">";
                echo"<input type='hidden' name='favoriteWidget' value=".setValue('favoriteWidget').">";
                
            echo"<label for='newsletter'>Do you want to receive our newsletter?</label>";
                echo"<input type='checkbox' name='newsletter' id='newsletter' value='yes'".setChecked('newsletter', 'yes').">";
            echo"<label for='comments'>Any comments?</label>";
                echo"<textarea name='comments' id='comments' rows='4' cols='50'>".setValue('comments')."</textarea>";
            
            echo"<div style='width: 30em;'>";
                echo"<input type='submit' name='submitButton' id='nextButton' value='Next &gt;'>";
                echo"<input type='submit' name='submitButton' id='backButton' value='&lt; Back' style='margin-right: 20px;' >";
            echo"</div>";
            echo"</div>";
            echo"</form>";
            echo'<br>';
            
           
        }
        
        
        
        function displayThanks(){
            echo"<h1>Thanks You</h1>";
            echo"<p>Thank you, your application has been received.</p>";
        }
        ?>
    </body>
</html>
