<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt diary.php
 * @fecha 04-may-2016
 */
require_once '../common.inc.php';
checkLogin();
displayPageHeader("Upcoming events", true);

echo "<dl>";
    echo "<dt>September 26</dt>";
    echo "<dd>Book reading by Billy Pierce</dd>";
    echo "<dt>October 3</dt>";
    echo "<dd>Club outing to Yellowstone</dd>";
    echo "<dt>October 17</dt>";
    echo "<dd>Book signing by Valerie Wordsworth at the local bookstore</dd>";
echo "</dl>";

echo "<p><a href='index.php'>Members' area home page</a></p>";

displayPageFooter();

