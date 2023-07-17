<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt subir_archivos_servidor.php
 fecha 17-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel='stylesheet' type='text/css' href="../common.css"/>
    </head>
    <body>
        <h3>Elementos en la tabla $_FILES</h3>
        <p>name = El nombre del archivo subido</p>
        <p>type = El tipo MIME del archivo subido</p>
        <p>size = El tamaño del archivo subido en bytes</p>
        <p>tmp_name = La ruta completa del archivo temporal en el servidor subido.
            Todos los archivos se almacenan como archivos temporales hasta que se necesitan</p>
        <p>error = El error o código de estado asociado con el archivo subido.<br>
            Este elemento contine un valor entero que corresponde con una constante. <br>
            Los posibles valores son:</p>
        <pre>
        UPLOAD_ERR_OK               0       El archivo se ha subido con éxito.<br>
        UPLOAD_ERR_INI_SIZE         1       El archivo es más grande que el tamaño del archivo permitido,
                                            execificado en la directiva ipload_max_filesize en el archivo php.ini.<br>
        UPLOAD_ERR_FORM_SIZE        2       El archivo es más grande que el tamaño de archivo permitido especificado
                                            en la directiva MAX_FILE_SIZE en el formulario.<br>
        UPLOAD_ERR_NO_FILE          4       No se ha subido ningún archivo.<br>
        UPLOAD_ERR_NO_TMP_DIR       6       PHP no tiene acceso a una carpeta temporal en el servidor
                                            para almacenar el archivo.<br>
        UPLOAD_ERR_CANT_WRITE       7       El archivo no se ha podido escribir en el disco duro del servidor por alguna razón.<br>
        UPLOAD_ERR_EXTENSION        8       El archivo subido se ha detenido por una de las extensiones cargadas.<br>
        </pre>
        
        
        Para limitar el tamaño de los archivos podemos modificar la directive en php.ini:<br>
        ;Maximun allow size for uploaded files.<br>
        upload_max_filesize = 32M<br>
        También podemos crear un campo oculto. Debe situarse antes del campo de subia.<br>
        <pre>< type="hidden" name="MAX_FILE_SIZE" value="10000"/></pre>
        <pre>< type="file" name="fileSelectFiled" id="fileSelectField" value=""/></pre>
        También podemos comprobar el tamaño subido manualmente y rechazarlo si es muy grande.<br>
        <pre>if($_FILE['photo']['size'] > 10000) die('file too big')</pre>
        
        <h4>Almacenar y utilizar un archivo subido del servidor</h4>
        Una vez se ha subido con éxito, se almacena automáticamente en una carpeta temporal en el servidor.<br>
        Para utilizarlo, hay que moverlo, podemos hacerlo con move_uploaded_file().<br>
        Toma dos argumentos, la ruta del archivo a mover y la ruta a la que moverlo.<br>
        Para saber la ruta existente del archivo, utilizamos el elemento de la tabla <b>tmp_name</b>.<br>
        move_uploaded_file() devuelve tru si se ha movido con éxito o false de lo contrario.
        <pre>
            if(move_uploaded_file($_FILES['photo']['tmp_name'], '/home/matt/photos/photo.jpg')){
                echo 'correcto';
            }else{
                echo'problemas';
            }
        </pre>
        
        
        <?php
        global $nuevoDirectorio;
        global $count;
        $count = 0;
        if(isset($_POST['sendPhoto'])){
            processForm();
        }else{
            displayForm();
        }
        
        function processForm(){
            global $count;
            $count++;
            global $nuevoDirectorio;
            if($count === 1){
            echo 'count vale: '.$count.'<br>';
            $nuevoDirectorio = contarDirectorios('silvia');
            }
            
            
            if(isset($_FILES['photo']) and $_FILES['photo']['error'] == UPLOAD_ERR_OK){
                if($_FILES['photo']['type'] != 'image/jpeg'){
                    echo"<p>JPEG photos only, thanks!</p>";
                }elseif(!move_uploaded_file($_FILES['photo']['tmp_name'], $nuevoDirectorio.'/'.  basename($_FILES['photo']['name']))){
                    echo"<p>Sorry, there was  a problem uploading that photo.</p>".$_FILES['photo']['error'];
                }else{
                    $nombreArchivo = $nuevoDirectorio.'/'.  basename($_FILES['photo']['name']);
                    $nuevoName = renombrarArchivo($nombreArchivo, $nuevoDirectorio);
                    //displayThanks($nuevoName);
                }
                //segunda imagen
                if (isset($_FILES['photo2']) and $_FILES['photo2']['error'] == UPLOAD_ERR_OK) {
                if($_FILES['photo2']['type'] != 'image/jpeg'){
                    echo"<p>JPEG photos only, thanks!</p>";
                }elseif(!move_uploaded_file($_FILES['photo2']['tmp_name'], $nuevoDirectorio.'/'.  basename($_FILES['photo2']['name']))){
                    echo"<p>Sorry, there was  a problem uploading that photo2.</p>".$_FILES['photo2']['error'];
                }else{
                    $nombreArchivo = $nuevoDirectorio.'/'.  basename($_FILES['photo2']['name']);
                    $nuevoName = renombrarArchivo($nombreArchivo, $nuevoDirectorio);
                }
                }
                //tercera imagen
                if (isset($_FILES['photo3']) and $_FILES['photo3']['error'] == UPLOAD_ERR_OK) {
                if($_FILES['photo3']['type'] != 'image/jpeg'){
                    echo"<p>JPEG photos only, thanks!</p>";
                }elseif(!move_uploaded_file($_FILES['photo3']['tmp_name'], $nuevoDirectorio.'/'.  basename($_FILES['photo3']['name']))){
                    echo"<p>Sorry, there was  a problem uploading that photo2.</p>".$_FILES['photo3']['error'];
                }else{
                    $nombreArchivo = $nuevoDirectorio.'/'.  basename($_FILES['photo3']['name']);
                    $nuevoName = renombrarArchivo($nombreArchivo, $nuevoDirectorio);
                }
                }
                //cuarta imagen
                if (isset($_FILES['photo4']) and $_FILES['photo4']['error'] == UPLOAD_ERR_OK) {
                if($_FILES['photo4']['type'] != 'image/jpeg'){
                    echo"<p>JPEG photos only, thanks!</p>";
                }elseif(!move_uploaded_file($_FILES['photo4']['tmp_name'], $nuevoDirectorio.'/'.  basename($_FILES['photo4']['name']))){
                    echo"<p>Sorry, there was  a problem uploading that photo2.</p>".$_FILES['photo4']['error'];
                }else{
                    $nombreArchivo = $nuevoDirectorio.'/'.  basename($_FILES['photo4']['name']);
                    $nuevoName = renombrarArchivo($nombreArchivo, $nuevoDirectorio);
                }
                }
                //quinta imagen
                if (isset($_FILES['photo5']) and $_FILES['photo5']['error'] == UPLOAD_ERR_OK) {
                if($_FILES['photo5']['type'] != 'image/jpeg'){
                    echo"<p>JPEG photos only, thanks!</p>";
                }elseif(!move_uploaded_file($_FILES['photo5']['tmp_name'], $nuevoDirectorio.'/'.  basename($_FILES['photo5']['name']))){
                    echo"<p>Sorry, there was  a problem uploading that photo5.</p>".$_FILES['photo5']['error'];
                }else{
                    $nombreArchivo = $nuevoDirectorio.'/'.  basename($_FILES['photo5']['name']);
                    $nuevoName = renombrarArchivo($nombreArchivo, $nuevoDirectorio);
                }
                }
                
            
            }else{
                switch ($_FILES['photo']['error']){
                    case UPLOAD_ERR_INI_SIZE:
                        $message = "The photo is larger than the server allows";
                            break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $message = "The photo is larger than the script allows.";
                            break;
                    case UPLOAD_ERR_NO_FILE:
                        $message = "No file was uploaded. Make sure you chose a file to upload.";
                            break;
                    default:
                        $message = "Please contact your server administrator for help.";
                }
                echo 'Sorry, there was a ploblem uploading that photo'.'<br>';
                echo $message;
            }
        //fin processForm    
        }
        
        
        function displayForm(){
            
            echo '<h1>Uploading a Photo</h1>';
            echo '<p>Please enter your name and choose a photo to upload, then click Send Photo</p>';
            
            echo '<form action="subir_archivos_servidor.php" method="post" enctype="multipart/form-data">';
                echo'<div style="width: 30em;">';
            echo'<input type="hidden" name="MAX_FILE_SIZE" value="50000" />';
            echo'<label for="visitorName">Your name</label>';
            echo'<input type="text" name="visitorName" id="visitorName" value="" />';
            echo'<label for="photo">Your photo</label>';
            
            echo'<input type="file" name="photo" id="photo" value="" />';
            echo'<input type="file" name="photo2" id="photo2" value="" />';
            echo'<input type="file" name="photo3" id="photo3" value="" />';
            echo'<input type="file" name="photo4" id="photo4" value="" />';
            echo'<input type="file" name="photo5" id="photo5" value="" />';
            
                echo'<div style="clear:both;">';
                    echo'<input type="submit" name="sendPhoto" value="sendPhoto" />';
                echo'</div>';
                
                echo '</div>';
            echo'</form>';
            
            
       //fin displayForm     
        }
        
            function displayThanks($nuevoName){
                global $nuevoDirectorio;
                echo 'en display : '.$nuevoDirectorio.'<br>';
                echo'<h1>Thank you</h1>';
                echo'Thanks for uploading your photo ';
                        if($_POST['visitorName'])echo $_POST['visitorName'];
                echo'<p>Here\'s your photo:</p>';
                echo"<p><img src=".$nuevoName." /></p>";
                echo 'La imagen se ha guardado con el nuevo nombre de: '.$nuevoName.'<br>';
                
           //fin displayThanks     
            }
            
            
            function contarDirectorios($usuario){
                global $nuevoDirectorio;
                $dir = 'photos/'.$usuario;
                $count = 0;
                if(!($handle = opendir($dir))) die("Cannot open $dir.");
             
                while($file = readdir($handle)){
                    if($file != "." && $file != ".."){
                        if(is_dir('photos/'.$usuario.'/'.$file)){
                            $count++;
                        }
                    }
                }
            
            if($count === 0){
                mkdir('photos/'.$usuario.'/1');
                $nuevoDir = 'photos/'.$usuario.'/1';
            }else{
                $nuevo = $count+1;
                mkdir('photos/'.$usuario.'/'.$nuevo); 
                $nuevoDir = 'photos/'.$usuario.'/'.$nuevo;
                
            }
            return $nuevoDir;
           
            //fin contarDirectorios    
            }
            
            function renombrarArchivo($nombreViejo, $nuevoDirectorio){
                
                $original = basename($nombreViejo);
                //Extraemos el directorio donde esta el archivo 
                $tmp = strstr($nombreViejo, $original, true);
                //Contamos cuantos archivos hay
                $total_imagenes = count(glob($nuevoDirectorio."/{*.jpg}",GLOB_BRACE));
                $total_imagenes++;
                //Renombramos el archivo con el ultimo
                $nombreNuevo = $tmp.$total_imagenes.'.jpg';
                rename($nombreViejo, $nombreNuevo);
                return $nombreNuevo;
               
       
            }
        ?>
    </body>
</html>
