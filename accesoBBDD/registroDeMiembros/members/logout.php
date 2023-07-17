<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt logout.php
 * @fecha 04-may-2016
 */

require_once '../common.inc.php';

session_start();
$_SESSION["member"]= "";
displayPageHeader("Logout out", true);

    echo "Thank you, you are now logged out.<a href='login.php'>Login again</a>.</p>";

    displayPageFooter();

