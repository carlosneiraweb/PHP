<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt view_members.php
 * @fecha 01-may-2016
 */

require_once("common.inc.php");
require_once("config.php");
require_once("Member.class.php");

$start = isset($_GET["start"]) ? (int)$_GET["start"] : 0;
$order = isset($_GET["order"]) ? preg_replace("/[^a-zA-Z]/", "", $_GET["order"]) : "username";
list($members, $totalRows) = Member::getMembers($start, PAGE_SIZE, $order);


        

displayPageHeader("View book club members");

?>
<h2>Displaying members <?php echo $start + 1 ?> - <?php echo min($start+PAGE_SIZE, $totalRows) ?>  of  <?php echo $totalRows ?> </h2>

<table cellspacing='0' style='width:70em; border: 1px solid #666;'>
<tr>

<th><?php if($order != "username") { ?><a href="view_members.php?order=username"><?php } ?> Username <?php  if( $order != "username"){ ?></a><?php } ?></th>
<th><?php if($order != "firstname") { ?><a href="view_members.php?order=firstname"><?php } ?>Firstname <?php if($order != "firstname") { ?></a><?php } ?></th>
<th><?php if($order != "lastname") { ?><a href="view_members.php?order=lastname"><?php } ?>Lastname <?php if($order != "lastname") { ?></a><?php } ?></th>

<?php

echo"</tr>";
$rowCount = 0;
foreach($members as $member){
    $rowCount++;



?>
<tr <?php if($rowCount % 2 ==0 )echo ' class="alt" '?>>
    <td><a href="view_member.php?memberId=<?php echo $member->getValueEncoded("id")?>
           &amp;start=<?php echo $start ?>$amp;order=<?php echo $order ?>">
        <?php echo $member->getValueEncoded("username")?></a></td>
    <td><?php echo $member->getValueEncoded("firstname")?></td>
    <td><?php echo $member->getValueEncoded("lastname")?></td>
</tr>

<?php
}

?>

</table>
    
    <div style="width: 30em; margin-top: 20px; text-align: center;">
        <?php if($start > 0){ ?>
        <a href="view_members.php?start=<?php echo max($start - PAGE_SIZE, 0)?>&amp;order=<?php echo $order ?>">Previous page</a>
        <?php } ?>
        &nbsp;
        <?php if($start + PAGE_SIZE < $totalRows) { ?>
        <a href="view_members.php?start=<?php echo min($start + PAGE_SIZE, $totalRows) ?>&amp;order=<?php echo $order ?>">Next page</a>
        <?php } ?>
        
    
    
    </div>
    

 