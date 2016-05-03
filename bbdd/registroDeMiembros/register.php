<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt register.php
 * @fecha 03-may-2016
 */

require_once 'common.inc.php';

if(isset($_POST["action"]) and $_POST["action"] == 'register'){
    //echo $_POST["action"].'<br>';
    processForm();
} else {
   
    displayForm(array(), array(), new Member(array()));//Se pasa una instancia de member
}

function displayForm($errorMessages, $missingFields, $member){
    displayPageHeader("Sign up for the book club!");
     
    if($errorMessages){
        foreach($errorMessages as $errorMessage){
            echo $errorMessage;
        }
    }  else{
    
    echo "<p>Thanks for choosing to join our book club.</p>";
    echo "<p>To register, please fill in your details below and click Send Details.</p>";
    echo "<p>Fields marked with an asterick (*) are required.</p>";

    } ?>
    
    <form action="register.php" method="post" style="margin-bottom:50px;">
            <div style="width: 30em;">
                <input type="hidden" name="action" value="register" />
                
        <label for="username"<?php validateField("username", $missingFields)?>>Choose a username *</label>
        <input type="text" name="username" id="username" value="<?php echo $member->getValueEncoded("username") ?>" />  
        <label for="password1" <?php if($missingFields) echo 'class="error"' ?>>Choose a password *</label> 
        <input type="password" name="password1" id="password1" value="" /> 
        <label for="password2" <?php if($missingFields) echo ' class="error"' ?>> Retype password * </label> 
        <input type="password" name="password2" id="password2" value=""/>
        <label for="emailaddress" <?php validateField("emailaddress", $missingFields) ?>> Email address * </label>  
        <input type="text" name="emailaddress" value="<?php echo $member->getValueEncoded("emailaddress") ?> "/>
        
        <label for="firstname" <?php validateField("firstname", $missingFields) ?>>FirstName * </label> 
        <input type="text" name="firstname" id="firstname" value="<?php echo $member->getValueEncoded("firstname") ?> "/> 
        <label for="lastname" <?php  validateField("lastname", $missingFields) ?>>Last Name * </label>  
        <input type="text" name="lastname" id="lastname"  value="<?php echo $member->getValueEncoded("lastname") ?> "/>
        
        <label <?php  validateField("gender", $missingFields) ?>> Your gender: * </label>  
            <label for="genderMale">Male</label>
            <input type="radio" name="gender" id="genderMale" value="m" <?php setChecked($member, "gender", "m") ?>/>
            <label for="genderFemale">Female </label>
            <input type="radio" name="gender" id="genderFemale" value="f" <?php setChecked($member, "gender", "f") ?> />
            
            
        <label for="favoritegenre">What's your favorite genre?</label>
            <select name='favoritegenre' id='favoriteGene' size='1'>
                <?php foreach($member->getGenders() as $value => $label){?>
                <option value='<?php echo $value ?> ' <?php setSelected($member, "favoritegenre", $value) ?>><?php echo $label ?></option>
                <?php } ?>
            </select>
        
        <label for='otherinterests'>What are you other interest? </label>
        <textarea name='otherinterests' id='otherInterests' rows='4' cols='50'>
            <?php echo $member->getValueEncoded("otherinterests")?>
        </textarea>
        
        <div style='clear:both;'>
            <input type='reset' name='resetButton' id='resetButton' value='Reset Form' />
            <input type='submit' name='submitButton' id='resetButton' value="Send Details" />
        </div>

            </div>
            
        <?php
         displayPageFooter();
        }
        
        function processForm(){
           
            $requiredFields = array("username", "password", "emailaddress", "firstname", "lastname", "gender");
            $missingFields = array();
            $errorMessages = array();
        try{
            $member = new Member(array(
        
            "username" => isset($_POST["username"]) ? preg_replace("/[^\-\_a-zA-Z0-9]/", "",$_POST["username"]) : "",
            "password" => (isset($_POST["password1"]) and isset($_POST["password2"]) and $_POST["password1"] == $_POST["password2"]) ? preg_replace("/[^ \-\_a-zA-Z0-9]/", "", $_POST["password1"]) : "", 
            "firstname" => isset($_POST["firstname"]) ? preg_replace("/[^ \'\-a-zA-Z0-9]/", "", $_POST["firstname"]) : "",
            "lastname" => isset($_POST["lastname"]) ? preg_replace("/[^ \'\-a-zA-Z0-9]/", "", $_POST["lastname"]) : "",
            "gender" => isset($_POST["gender"]) ? preg_replace("/[^mf]/", "", $_POST["gender"]) : "",
            "favoritegenre" => isset($_POST["favoritegenre"]) ? preg_replace("/[^a-zA-Z]/","", $_POST["favoritegenre"]) : "",
            "emailaddress" => isset($_POST["emailaddress"]) ? preg_replace("/[^\@\.\-\_a-zA-Z0-9]/", "", $_POST["emailaddress"]) : "",
            "otherinterests" => isset($_POST["otherinterests"]) ? preg_replace("/[^ \'\,\.\-a-zA-Z0-9]/", "", $_POST["otherinterests"]) : "",
            "joindate" => date("Y-m-d")
        ));
        
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        foreach($requiredFields as $requiredField){
            if(!$member->getValue($requiredField)){
                $missingFields[] = $requiredField;
            }
        }
        
        
        if($missingFields){
            $errorMessages[] = '<p class="error">There were some missing fields in the form you submitted. Please complete the'
                    . 'fields highlighted below and click Send Details to resend the form.</p>';
        }
        
        if(!isset($_POST["password1"]) or !isset($_POST["password2"]) or !$_POST["password1"] or !$_POST["password2"] or $_POST["password1"] != $_POST["password2"]){
            $errorMessages[] = '<p class="error">Please make sure you enter your password correctly in both password fileds.</p>';
        }
        
        if(Member::getByUsername($member->getValue("username")) ){
            $errorMessages[] = '<p class="error">A member with that username already exists in the database. Please choose another username.</p>';
        }
        
        if(Member::getByEmailAddress($member->getValue("emailaddress"))){
            $errorMessages[] = '<p class="error">A member with that email already exists.</p>';
            
        }
        
        if($errorMessages){
            displayForm($errorMessages, $missingFields, $member);
        } else {

            $member->insert();
            displayThanks();
        }
        

    }
    
    
    function displayThanks(){
        displayPageHeader("Thanks for registering!");
        
        ?>
        <p>Thank You, you are now a registered member of the book club.</p>
    <?php 
        displayPageFooter();
    }