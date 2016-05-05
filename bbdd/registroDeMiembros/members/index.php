<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt index.php
 * @fecha 04-may-2016
 */

require_once('../common.inc.php');

checkLogin();
displayPageHeader("Welcome to the Members' area", true);
?>
<p>Welcome,<?php echo $_SESSION['member']->getValue('firstname') ?> ! Please choose an option below:</p>
<?php
echo "<ul>";
    echo "<li><a href='diary.php'>Upcoming events</a></li>";
    echo "<li><a href='books.php'>Current reading</a></li>";
    echo "<li><a href='contact.php'>Contact the book club</a></li>";
    echo "<li><a href='logout.php'>Logout</a></li>";
echo "</ul>";

displayPageFooter();
    

