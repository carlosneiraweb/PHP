<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt primerEjemplo.php
 fecha 28-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
        $dns = "mysql:dbname=mydatabase";
        $username = "root";
        $password = "";
        
        
        try{
            $con = new PDO($dns, $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (Exception $ex) {
                echo"Connection failed: ".$ex->getMessage();
                
        }
        
        $sql = "Select * from fruit";
        
        echo"<ul>";
        try{
            $rows = $con->query($sql);
            foreach($rows as $row){
                echo "<li>A ".$row["name"]. " is ". $row["color"]."</li>";
            }
        } catch (Exception $ex) {
            echo "Query failed: ".$ex->getMessage();
        }
        
        echo"</ul>";
        $con = null;
        
        
        
        ?>
    </body>
</html>
