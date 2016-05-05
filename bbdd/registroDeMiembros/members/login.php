<?php
session_start();
/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt login.php
 * @fecha 04-may-2016
 */

require_once("../common.inc.php");

if(isset($_POST["action"]) and $_POST["action"] == "login"){
    processForm();
} else {
    displayForm(array(), array(), new Member(array()));
}


function displayForm($errorMessages, $missingFields, $member){
    displayPageHeader("Login to the book club members' area", true);
    if($errorMessages){
        foreach ($errorMessages as $errorMessage){
            echo $errorMessage;
        }
    } else{   
       echo "<p>To access the members' area, please enter your username and password below then click Login.</p>"; 
    }
    ?>
<form action="login.php" method="post" style="margin-bottom: 50px;">
    
    <div style="width: 30em;">
        <input type="hidden" name="action" value="login"/>
        
        <label for="username" <?php validateField("username", $missingFields) ?>>Username</label>
        <input type="text" name="username" id="username" value="<?php echo $member->getValueEncoded("username") ?>" />
        <br>
        <label for="password" <?php if($missingFields) echo 'class="error"' ?>>Password</label>
        <input type="password" name="password" id="password" value="" />
        
        <div style="clear:both;">
            <input type="submit" name="submitButton" id="submitButton" value="Login"/>
        </div>
    </div>
    
    
</form>
 
<?php 
    displayPageFooter();
//fin displayForm    
}

function processForm(){
    $requiredFields = array("username", "password");
    $missingFields = array();
    $errorMessages = array();
    
    $member = new Member(
            array(
                "username" => isset($_POST["username"]) ? preg_replace("/[^\-\_a-zAZ0-9]/", "", $_POST["username"]) : "",
                "password" => isset($_POST["password"]) ? preg_replace("/[^\-\_a-zAZ0-9]/", "", $_POST["password"]) : "",
            )
            );
    
    foreach($requiredFields as $requiredField){
        if(!$member->getValue($requiredField)){
            $missingFields[] = $requiredField;
        }
    }
    
    if($missingFields){
        $errorMessages[] ="<p class='error'>There were some missing fields in the form you submitted. "
                . "Please complete the fields  highlighted  below and click Login to resend the form.</p>";      
    } elseif(!$loggedInMember = $member->authenticate()) {
       $errorMessages [] = "<p class='error'>Sorry, we could not log you in with those details."
               . "Please check your username and password, and try again.</p>"; 
    }
    
    if($errorMessages){
        displayForm($errorMessages, $missingFields, $member);
    } else {
        
        $_SESSION["member"] = $loggedInMember;
        displayThanks();
    }

//fin processForm    
}

function displayThanks(){
    displayPageHeader("Thank for your login in!", true);
    ?>
    <p>Thanks you for login in. Please proceed to the <a href='index.php'>Members' area</a>.</p>
    <?php
    displayPageFooter();
}
