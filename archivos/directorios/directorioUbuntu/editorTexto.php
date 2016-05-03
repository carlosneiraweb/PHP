
    <body>
        <?php
        
        define("PATH_TO_FILES", "/home/carlos/Documentos/hola");
        if(isset($_POST["saveFile"])){
            saveFile();
        }elseif(isset ($_GET["filename"])){
            displayEditForm();
        }elseif(isset ($_POST["createFile"])){
            createFile();
        }else{
            displayFileList();
        }
        
        function displayFileList($message=""){
            displayPageHeader();
            if(!file_exists(PATH_TO_FILES)) die("Directory not found");
            if(!($dir = dir(PATH_TO_FILES))) die("Can't open directory");    
        if($message) echo 'Error: '.$message.'<br>';
        echo'<h2>Choose a file to edit: </h2>';
        echo '<table cellspacing="0" border="1px" style="width: 40em; border: 1px solid #666;">';
        echo '<tr>';
            echo '<th>Filedname</th>';
            echo '<th>Size</th>';
            echo '<th>Last Modified</th>';
        echo '</tr>';
        
        while($filename = $dir->read()){
            $filePath = PATH_TO_FILES . "/$filename";
            if($filename != "." && $filename != ".." && !is_dir($filePath) && strrchr($filename, ".") == ".txt"){
                echo '<tr><td><a href="editorTexto.php?filename='.urlencode((binary)$filename).'">'.$filename.'</a></td>';
                echo '<td>'.filesize($filePath).'</td>';
                echo '<td>'.date("M j, Y H:i:s", filemtime($filePath)).'</td></tr>';
            }
        }
        
        $dir->close();
        echo '</table>';
        echo '<h2>...or create a new file: </h2>';
        echo '<form action="editorTexto.php" method="POST">';
            echo '<div style="width: 20em;">';
            echo '<label for="filename">Filename</label>';
            echo '<div style="float: right; width:7%; margin-top:0.7em;">.txt</div>';
            echo '<input type="text" name="filename" id="filename" style="width: 50%;" value=""/>';
            echo '<div style="clear:both;">';
            echo '<input type="submit" name="createFile" value="create File" />';
        echo '</div>';
        echo '</div>';
        echo '</form>';
        echo '</body>';
        echo '</html>';     
            
            
       //fin displayFileList     
        }
        
        
        
        function displayEditForm($filename=""){
         
            if(!$filename) $filename= basename($_GET["filename"]);
            if(!$filename) die("Invalid filename");
            $filepath = PATH_TO_FILES."/$filename";
            if(!file_exists($filepath)) die("File not found");
            displayPageHeader();
            
            echo "<h2>Editing $filename </h2>";
            echo '<form action="editorTexto.php" method="POST">';
            echo '<div style="width: 40em;">';
          
            echo "<input type=hidden name=filename value=$filename/>";
           
            echo '<textarea name="fileContents" id="fileContents" rows="20" cols="80" style="width:100%;">';
            echo htmlspecialchars(file_get_contents($filepath)).'</textarea>';
            echo '<div style="clear:both;">';
            echo '<input type="submit" name="saveFile" value="Save File"/>';
            echo '<input type="submit" name="cancel" value="cancel" style="margin-right: 20px;"/>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</body>';
            echo '</html>';
            
      //fin displayEditForm      
        }
        
        
        function saveFile(){
            
            $filename = basename($_POST["filename"]);
            $filepath = PATH_TO_FILES."/$filename";
      
           
            if(file_exists($filepath)){
                if(file_put_contents($filepath, $_POST["fileContents"]) === false) die("Couldn't save file");
            displayFileList();    
            }else{
                die("File not found");
            } 
        
       //fin saveFile     
        }
        
        
        function createFile(){
            
            $filename = basename($_POST["filename"]);
            $filename = preg_replace("/[^A-Za-z0-9_\-]/","",$filename);
            
            if(!$filename){
                displayFileList("Invalid filename - please try again");
                return;
            }
            
            $filename .= ".txt";
            $filepath = PATH_TO_FILES."/$filename";
            if(file_exists($filepath)){
            displayFileList("The file $filename already exists!");
            } else {
                if(file_put_contents($filepath,"") === false)die("Couldn't create file");
            chmod($filepath, 0666);
             displayEditForm("$filename");
            }
            
        //fin createFile    
        }
        
        function displayPageHeader(){
            
            echo '<!DOCTYPE html>';

            echo '<html>';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<title>A simple text editor</title>';
            echo '<style type="text/css">';
            echo '.error{background-color: #d33; color: white; padding: 0.2em;}';
            echo 'th{text-align: left; background-color: #999;}';
            echo 'th td{padding:0.4em;}';
            echo '</style>';
            echo '</head>';
            echo '<body>';
            echo '<h1>A simple text editor</h2>';
            
            
            
            
            
            
        //fin displayPageHeader    
        }
        
       