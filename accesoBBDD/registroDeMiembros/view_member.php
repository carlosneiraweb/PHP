<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt view_member.php
 * @fecha 01-may-2016
 */

require_once("common.inc.php");
require_once("config.php");
require_once("Member.class.php");
require_once("LogEntry.class.php");

$memberId = isset($_REQUEST["memberId"]) ? (int)$_REQUEST["memberId"] : 0;

if(!$member = Member::getMember($memberId)){
        displayPageHeader("Error");
    echo"<div>Member not found.</div>";
    displayPageFooter();
    exit;
}

if(isset($_POST["action"]) and $_POST["action"] == "Save Changes"){
    saveMember();
} elseif(isset ($_POST["action"]) and $_POST["action"] == "Delete Member"){
    deleteMember();
} else {
    displayForm(array(), array(), $member);
}
    
function displayForm($errorMessages, $missingFields, $member){
    
    $logEntries = LogEntry::getLogEntries($member->getValue("id"));
    displayPageHeader("View member: ".$member->getValueEncoded("firstname")."".$member->getValueEncoded("lastname"));
    
    if($errorMessages){
        foreach ($errorMessages as $errorMessage){
            echo $errorMessage;
        }
    }
    
    $start = isset($_REQUEST['start']) ? (int)$_REQUEST['start'] : 0;
    $order = isset($_REQUEST['order']) ? preg_replace("/[^a-zA-Z]/","", $_REQUEST['order']) : 'username';
    
    ?>

<form action="view_member.php" method="post" style="margin-bottom: 50px;">
    
    <div style="width: 50em;">
        <input type="hidden" name="memberId" id="memberId" value="<?php echo $member->getValueEncoded("id") ?>"/>
        <input type="hidden" name="start" id="start" value="<?php echo $start ?> "/>
        <input type="hidden" name="order" id="order" value="<?php echo $order ?> "/>
        
        <label for="username" <?php validateField("username", $missingFields) ?>>Username *</label>
        <input type="text" name="username" id="username" value="<?php echo $member->getValueEncoded("username") ?>"/>
        <label for="password">New Passowrd</label>
        <input tye="password" name="password" id="password" value=""/>
        <label for="emailaddress" <?php validateField("emailaddress", $missingFields) ?>>Email Address * </label>
        <input type="text" name="emailaddress" id="emailaddress" value="<?php echo $member->getValueEncoded("emailaddress") ?>"/>
        <label for="firstname" <?php validateField("firstname", $missingFields) ?>>First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $member->getValueEncoded("firstname") ?>"/>
        <label for="lastname"<?php validateField("lastname", $missingFields) ?>>Last Name * </label>
        <input type="text" name="lastname" id="lastName" value="<?php echo $member->getValueEncoded("lastname") ?>"/>
        <label for="joindate"> <?php validateField("joindate", $missingFields) ?>Join on * </label>
        <input type="text" name="joindate" id="joindate" value="<?php echo $member->getValueEncoded("joindate") ?>"/>
        
        <label <?php  validateField("gender", $missingFields) ?>>Gender * </label>
            <label for="gendermale">Male</label>
            <input type="radio" name="gender" id="genderMale" value="m" <?php setChecked($member, "gender", "m")?>/>
            <label for="genderfemale">Female</label>
            <input type="radio" name="gender" id="genderFemale" value="f" <?php setChecked($member, "gender", "f") ?>/>
            
        <label for="favoritegenre">Favorite Genre</label>
            <select name="favoritegenre" id="favoritegenre" size="1">
                <?php foreach ($member->getGenders() as $value => $label){ ?>
                <option value="<?php echo $value ?> " <?php setSelected($member, "favoritegenre", $value) ?>> <?php echo $label ?></option>
                <?php } ?>
            </select>
        <label for="otherinterests">Other interests</label> 

        <textarea name="otherinterests" id="otherInterests" rows="4" cols="50">
            <?php echo $member->getValueEncoded("otherinterests") ?>
        </textarea>
        
        <div style="clear:both;">
            <input type="submit" name="action" id="saveButton" value="Save Changes" />
            <input type="submit" name="action" id="deleteButton" value="Delete Member" style="margin-right: 20px;" />
            
        </div>
    </div>
</form>


            <h2>Access log</h2>
   
            <table cellspacing="0" style="width: 30em; border:1px solid #666;">
                <tr>
                    <th>Web page</th>
                    <th>Number of visits</th>
                    <th>Last visits</th>
                </tr>
           

<?php 
    
    $rowCount = 0;
    
    foreach($logEntries as $logEntry){
        $rowCount++;
        ?>
            <tr<?php if($rowCount % 2 == 0) echo 'class="alt"'?>>
                <td><?php echo $logEntry->getValueEncoded("pageUrl") ?></td>
                <td><?php echo $logEntry->getValueEncoded("numVisits") ?></td>
                <td><?php echo $logEntry->getValueEncoded("lastAccess") ?></td>       
            </tr>
    <?php
    }
    ?>

</table>

    <div style="width: 30em; margin-top:20px; text-align: center;">
    
        <a href="view_members.php?start=<?php echo $start ?>&amp;order=><?php echo $order ?>">Back</a>    
    
    </div>

<?php 
    displayPageFooter();   
}  


    function saveMember(){
      
        $requiredFields = array("username", "emailaddress", "firstname", "lastname", "joindate", "gender");
        $missingFields = array();
        $errorMessages = array();
        
        $member = new Member (array(
            
           "id" => isset($_POST["memberId"]) ? (int) $_POST["memberId"] : "",
           "username" => isset($_POST["username"]) ? preg_replace("/[^\-\_a-zAZ0-9]/", "", $_POST["username"]) : "",
           "password" => isset($_POST["password"]) ? preg_replace("/[^\-\_a-zAZ0-9]/", "", $_POST["password"]) : "",
           "firstname" => isset($_POST["firstname"]) ? preg_replace("/[^\'\-a-zA-Z0-9]/","", $_POST["firstname"]) : "",
           "emailaddress" => isset($_POST["emailaddress"]) ? preg_replace("/[^\@\.\-\_a-zA-Z0-9]/", "", $_POST["emailaddress"]) : "",
           "lastname" => isset($_POST["lastname"]) ? preg_replace("/[^\'\-a-zAZ0-9]/", "", $_POST["lastname"]) : "",
           "joindate" => isset($_POST["joindate"]) ? preg_replace("/[^\-0-9]/", "", $_POST["joindate"]) : "",
           "gender" => isset($_POST["gender"]) ? preg_replace("/[^mf]/", "", $_POST["gender"]) : "",
           "favoritegenre"  => isset($_POST["favoritegenre"]) ? preg_replace("/[^a-zA-Z]/", "", $_POST["favoritegenre"]) : "",
           "otherinterests" => isset($_POST["otherinterests"]) ? preg_replace("/[^\'\,\.\-a-zA-Z0-9]/", "", $_POST["otherinterests"]) : ""
            
        ));
        
    foreach($requiredFields as $requiredField){
        if(!$member->getValue($requiredField)){
            $missingFields[] = $requiredField;
        }
    }
    
    
    
    if($missingFields){
            $errorMessages[] = '<p class="error">There were some missing fields in the form you submitted. Please complete the'
                    . 'fields highlighted below and click Send Details to resend the form.</p>';
        }
        
        if($existingMember = Member::getByUsername($member->getValue("username")) and $existingMember->getValue("id") != $member->getValue("id")){
            $errorMessages[] = '<p class="error">A member with that username already exists in the database. Please choose another username.</p>';
                }
                
        if($existingMember = Member::getByEmailAddress($member->getValue("emailaddress")) and $existingMember->getValue("id")){
            $errorMesages[] ='<p class="error">A member with that email address already exists</p>';
        }
        
      
        
        if($errorMessages){
            displayForm($errorMessages, $missingFields, $member);
        } else {
            $member->update();
            displaySuccess();
        }
    }
    
    function deleteMember(){
        
        $member = new Member(array(
            "id" => isset($_POST["memberId"]) ? (int) $_POST["memberId"] : "",
        ));
        LogEntry::deleteAllForMember($member->getValue("id"));
        $member->delete();
        displaySuccess();
    //fin deleteMember    
    }
    
    function displaySuccess(){
        
        $start = isset($_REQUEST["start"]) ? (int)$_REQUEST["start"] : 0;
        $order = isset($_REQUEST["order"]) ? preg_replace("/[^a-zA-Z]/", "", $_REQUEST["order"]) : "username";
        displayPageHeader("Changes saved");
        ?>

<p>Your changes have been saved.<a href="view_members.php?start=<?php echo $start ?>&amp;order=<?php echo $order ?>">Return to member list</a></p>
        <?php 
                displayPageFooter();

//fin displaySuccess    
    }
    
    
    
    
    
    
        