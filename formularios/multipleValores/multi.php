<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt multi.php
 fecha 05-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../common.css">
        <title></title>
    </head>
    <body>
        <h1>Thank you</h1>
        <?php
        $favoriteWidgets = "";
        $newsletters ="";
        
        if(isset($_POST['favoriteWidgets'])){
            foreach($_POST["favoriteWidgets"] as $widget){
                $favoriteWidgets .= $widget. ', ';
            }
        }
        if(isset($_POST["newsletter"])){
            foreach($_POST["newsletter"] as $newsletter){
                $newsletters .= $newsletter .', ';
            }
        }
        
        //$favoriteWidgets = preg_replace("/, $/", "",$favoriteWidgets);
        //$newsletters = preg_replace("/, $/", "", $newsletters);
        
        
        ?>
        
        <dl>
            <dt>FirstName</dt><dd><?php echo $_POST["firstName"]?></dd>
            <dt>Favorite widgets</dt><dd><?php echo $favoriteWidgets?></dd>
            <dt>Do you want to receive the following newsletters:</dt><dd><?php echo $newsletters?></dd>
        </dl>
    </body>
</html>
