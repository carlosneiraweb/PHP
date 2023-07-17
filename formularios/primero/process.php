<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt process.php
 fecha 05-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../common.css"/>
        <title></title>
    </head>
    <body>
        <h1>Thank you</h1>
        <dl>
            <dt>FirstName</dt><dd><?php echo $_POST["firstName"]?></dd>
            <dt>Last Name</dt><dd><?php echo $_POST["lastName"]?></dd>
            <dt>Password</dt><dd><?php echo $_POST["password1"]?></dd>
            <dt>Retyped password</dt><dd><?php echo $_POST["password2"]?></dd>
            <dt>Gender</dt><dd><?php echo $_POST["gender"]?></dd>
            <dt>Favorite</dt><dd><?php echo $_POST["favoriteWidget"]?></dd>
            <dt>Do you want to receive our newsletter?</dt><dd><?php echo $_POST["newsletter"]?></dd>
            <dt>Comments</dt><dd><?php echo $_POST["comments"]?></dd>   
        </dl>   
    </body>
</html>
