<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $dirPath = "../../../../var/www";
        
        function traverseDir($dir){
            
            echo "<h2>Listing $dir...</h2>";
            if(!($handle = opendir($dir))) die("Cannot open $dir.");
            $files = array();
            
            while ($file = readdir($handle)){
                if($file != "." && $file != ".."){
                    if(is_dir($dir."/".$file)) $file.="/";
                    $files[] = $file;
                }
            }
            
            sort($files);
            echo '<ul>';
            foreach ($files as $file)echo "<li>$file</li>";
            echo '</ul>';
            
        foreach ($files as $file){
            if(substr($file, -1) == "/") traverseDir ("$dir/". substr($file, 0, -1));
        }
            
        closedir($handle);    
            
        //fin function    
        }
        
        
        
        traverseDir($dirPath);
        
        
        
        ?>
    </body>
</html>
