<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt contact.php
 * @fecha 04-may-2016
 */

require_once '../common.inc.php';
checkLogin();
displayPageHeader("Contact the book club", true);

    echo"<p>You can contact Marian, the organizer of the book clun, on <strong>187-812-8166</strong>.</p>";
    echo"<p><a href='index.php'>Members' area home page</a></p>";
    
    displayPageFooter();

