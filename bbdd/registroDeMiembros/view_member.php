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

$memberId = isset($_GET["memberId"]) ? (int)$_GET["memberId"] : 0;

if(!$member = Member::getMember($memberId)){
        displayPageHeader("Error");
    echo"<div>Member not found.</div>";
    displayPageFooter();
    exit;
}


$logEntries = LogEntry::getLogEntries($memberId);
displayPageHeader("View member: ".$member->getValueEncoded("firstname"). "".$member->getValueEncoded("lastname"));
?>

<dl style="width: 30em;">
    <dt>UserName</dt>
    <dd><?php echo $member->getValueEncoded('username') ?></dd>
    <dt>First Name</dt>
    <dd><?php echo $member->getValueEncoded('firstname') ?></dd>
    <dt>Last Name</dt>
    <dd><?php echo $member->getValueEncoded('lastname') ?></dd>
    <dt>Joined on</dt>
    <dd><?php echo $member->getValueEncoded('joinDate') ?></dd>
    <dt>Gender</dt>
    <dd><?php echo $member->getGenderString() ?></dd>
    <dt>Favorite genre</dt>
    <dd><?php echo $member->getFavoriteGenreString() ?></dd>
    <dt>Email address</dt>
    <dd><?php echo $member->getValueEncoded('emailAddress') ?></dd>
    <dt>Other interest</dt>
    <dd><?php echo $member->getValueEncoded('otherInterest') ?></dd>  
</dl>

<h2>Access log</h2>

<table cellspacing="0" style="width: 30em; border: 1px solid #666;">
    <tr>
        <th>Web Page</th>
        <th>Number of visits</th>
        <th>Last visits</th>
    </tr>
    
    <?php
    
    $rowCount = 0;
    foreach($logEntries as $logEntry){
        $rowCount++;
    ?>
    
    <tr<?php if($rowCount % 2 == 0) echo 'class="alt"' ?>>
        <td><?php echo $logEntry->getValueEncoded("pageUrl") ?></td>
        <td><?php echo $logEntry->getValueEncoded("numVisits") ?></td>
        <td><?php echo $logEntry->getValueEncoded("lastAccess") ?></td>
    </tr>
    <?php
    }
    ?>
    
</table>

<div style="width: 30em; margin-top:20px; text-align: center;">
    <a href="javascript:history.go(-1)">Back</a>
</div>

<?php
    displayPageFooter();
?>