<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt books.php
 * @fecha 04-may-2016
 */

require_once '../common.inc.php';
checkLogin();
displayPageHeader("Our current reading list", true);

echo "<dl>";
    echo"<dt>Moby Dick</dt>";
    echo "<dd>by Herman Melville</dd>";
    echo "<dt>Down and Out in Paris and London</dt>";
    echo "<dd>by George Orwell</dd>";
    echo "<dt>The grapes of Wrath</dt>";
    echo "<dd>by John Steninbeck</dd>";
echo "</dl>";

echo"<p><a href='index.php'>Member's area home page</a></p>";

displayPageFooter();
    

