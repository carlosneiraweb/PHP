<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt registration.php
 fecha 05-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../common.css">
        <title></title>
        <style type="text/css">
            .error{background: #d33; color:white; padding: .2em;}
        </style>
    </head>
    <body>
        <?php
        if(isset($_POST["submitButton"])){
            echo 'nombre = '.$_POST['firstName'].'<br>';
            echo 'pass '.$_POST['password2'];
            processForm();
        }else{
            displayForm(array());
        }
            
            
        function validateField($fieldName, $missingFields){
            if(in_array($fieldName, $missingFields)){
                echo 'class="error"';
            }
        }
           
        
        function setValue($fieldName){
            if(isset($_POST[$fieldName])){
                echo $_POST[$fieldName];
            }
        }
            
        function setChecked($fieldName, $fieldValue){
            if(isset($_POST[$fieldName]) and $_POST[$fieldName] == $fieldValue){
                echo 'checked="checked"';
            }
        }
            
        function setSelected($fieldName, $fieldValue){
            if(isset($_POST[$fieldName]) and $_POST[$fieldName] == $fieldValue){
                echo 'selected="selected"';
            }
        }
        
        
        function processForm(){
            
            $requiredFields = array("firstName","password1", "password2", "gender");
            $missingFields = array();
            foreach($requiredFields as $requiredField){
                if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
                    
                    $missingFields[] = $requiredField;
                }
            }
            
            if($missingFields){
                displayForm($missingFields);
            }else{
                displayThanks();
            }
       //fin processForm     
        }
        function displayForm($missingFields){
            
        ?>
        
        <h1>Membership Form</h1>
        
        <?php if($missingFields){?>
        <p class="error">There were some ploblems with the form you submitted.</p>
        <?php } else { ?>
        <p>Thanks for choosing to join The Widget Club. To register, please fill
            in your details below and click Send Details. Fields marked with
            and (*) are required.</p>
        
        
        <?php } ?>
        <form action="registration.php" method="post">
            
            <div style="width:30em;">
                <label for="firstName"<?php validateField("firstName", $missingFields)?>>FirstName *</label>
                <input type="text" name="firstName" id="firstName" value=""/><br/>
                <label for="password1"<?php if($missingFields) echo 'class="error"'?>>Choose a password * </label>
                <input type="password" name="password1" id="password1" value=""/><br/>
                <label for="password2"<?php if($missingFields) echo 'class="error"'?>>Retype password *</label>
                <input type="password" name="password2" id="password2" value=""/><br/>
                <br/>
                
                <label <?php validateField("gender", $missingFields)?>>Your gender: *</label>
                <label for="genderMale">Male</label>
                <input type="radio" name="gender" id="genderMale" value="M" <?php setChecked("gender", "M")?>/><br/>
                <label for="genderFemale">Female</label>
                <input type="radio" name="gender" id="genderFemale" value="F" <?php setChecked("gender","F")?>/><br/>
                
                <br/>
                
                <label for="favoriteWidget">What's your favorite widget? *</label><br/>
                <select name="favoriteWidget" id="favoriteWidget" size="1">
                    <option value="superWidget"<?php setSelected("favoriteWidget", "superWidget")?>>The superWidget</option>
                    <option value="megaWidget"<?php setSelected("favoriteWidget", "megaWidget")?>>The MegaWidget</option>
                    <option value="wonderWidget"<?php setSelected("favoriteWidget", "wonderWidget")?>>The WonderWidget</option>
                </select>
                <br/>
                
                <label for="newsletter">Do you want to receive our newsletter?</label>
                <input type="checkbox" name="newsletter" id="newsletter" value="yes" <?php setChecked("newsletter", "yes")?>/><br/>
                <br/>
                
                <div style="clear:both;">
                    <input type="submit" name="submitButton" id="submitButton" value="Send Details"/>
                    <input type="reset" name="resetButton" id="resetButton" value="Reset Button" style="margin-right: 20px;"/>
                </div>
            </div>
 
        </form>
        <?php
        }
        function displayThanks(){
        ?>
        <h1>Thank You</h1>
        <p>Thank you, your application has been received</p>
        <?php
        }
        ?> 
    </body>
</html>
