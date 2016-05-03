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
         //error_reporting(E_ALL);
         //ini_set("display_errors", 1);
         
         
      echo '<h5>Trabajar con  archivos.</h5>';
      var_dump(getdate());
      $date=  getdate();
      echo 'Hoy es: '.$date['mday'].'/'.$date['mon'].'/'.$date['year'].'<br>';
      
      echo '<h5>Filesize(), file_exists().Saber si un archivo existe y su tamaño</h5>';
      if(file_exists('prueba.txt')){
          echo 'El tamaño de prueba.txt es: '.filesize('prueba.txt');
      } else {
          echo 'El archivo no existe';
      }
      echo'<br>';
      echo'***********************************'.'<br>';
      
      echo'<h5>Métodos relacionados con con tiempo.</h5>';
      echo 'Fileatime() nos devuelve el momento del último aceso al archivo'.'<br>';
      echo fileatime('prueba.txt').'<br>';
      echo 'Filectime() nos devuelve la fecha de la último cambio'.'<br>'.
              'Se considera cambio cuando es creado o escrito o se han camiado sus permisos.'.'<br>';
      echo filectime('prueba.txt').'<br>';
      echo 'Filemtime() nos devuelve la fecha de la última modificación.'.'<br>'.
              'Se considera modificación cuando es creado o se ha cambiado su contenido'.'<br>';
      echo filemtime('prueba.txt').'<br>'.'<br>';
      $X = filemtime('prueba.txt');
      $mes =  getdate($X);
      echo 'El último día se modifico el archivo fue: '.$mes['mday']. ' del mes '.$mes['mon'].'<br>';
      echo'***********************************'.'<br>';

      
      echo '<h5>Recuperar el nombre de un archivo.</h5>';
      $filename = basename("c:/xampp/htdocs/entradas/index.html");
      echo 'La raiz del proyecto es: '.$filename.'<br>';
      echo 'Recuperamos el nombre del del directorio superior. con basename.'.'<br>';
      $dir = basename("c:/xampp/htdocs/entradas");
      echo $dir.'<br>';
      echo 'Quitamos la extensión del archivo con el segundo argumento.'.'<br>';
      $file = basename("c:/xampp/htdocs/entradas/index.html", '.html');
      echo'***********************************'.'<br>';
      
      
      echo '<h5>Abrir y cerrar arcivos</h5>';
      echo 'Fopen() devuelve un indiador al archivo que se quiere abrir. También abre una url'.'<br>';
      echo'r => Abre el archivo solo para lectura.'.'<br>';
      echo 'r+ =>Abre el archivo solo para lectura y escritura.'.'<br>';
      echo 'w => Abre el archivo solo para escritura. Cualquier contendo '.
              ' existente se perdera. Si el archivo no existe PHP lo intenatara crear.'.'<br>';
      echo'w+ => Abre el archivo para lectura y escritura. Cualquier contenido de archivo '.
              ' se perderá. Si no existe PHP intenta crearlo.'.'<br>';
      echo 'a => Abre el archivo sólo para añadir. Los datos se escribe al final del archivo.'.
              ' Si el archivo no existe PHP intenta crearlo.'.'<br>';
      echo 'a+ => Abre el archivo para lectura y añadir. Los datos se escriben al final del archivo.'.
              ' Si no existe PHP intenta crearlo'.'<br>';
      echo 'fopen("./ejemplo.txt", "rb");'.'<br>';
      echo 'Como se ve se ha añadido una "b" para indicar que el archivo se trate como binario(predeterminado.'.'<br>'.
              'Con una "t" le estaríamos diciendo que lo tratara como texto, PHP intentará traducir los'.'<br>'.
              ' carácteres de fin-de-línea desde el estándar del sistema operativo.'.'<br>';
      echo 'El modo binario se recomienda por razones de portabilidad entre distintos SO'.'<br>';
      
      echo 'La constante PHP_EOL muestra los caracteres de fin de línea en la plataforma que se ejecuta el script: '.'<br>';
      echo'***********************************'.'<br>';
      
      echo '<h5>Leer y escribir en archivos.</h5>';
      if(!($archivo = fopen("prueba.txt", 'rb'))) die("No se puede abrir el archivo");
      echo 'Leemos 200 caracteres.','<br>';
      $datos = fread($archivo, 200);
      fclose($archivo);
      echo $datos.'<br>';
      echo 'Ahora abrimos el archivo otra vez, y sin perder lo escrito añadimos al final.'.'<br>';
      $archivo2 = fopen("prueba.txt", 'a');
      //$texto = 'HEMOS AÑADIDO.'.PHP_EOL;
      //fwrite($archivo2, $texto);
      //fclose($archivo2);
      $archivo3 = fopen("prueba.txt", 'rt');
      $datos3 = fread($archivo3, 500);
      echo $datos3.'<br>';
      echo '<br>';
      
       
      echo 'Fgets() lee desde el indicador actual hasta el final de la línea'.'<br>'.
            'Se puede limitar el número de caracteres que devuelve con un tercer argumento, '.'<br>.'.
            'fgets() se deteniene al llegar ese número -1. Apropiado cuando no saltos de línea en el archivo.'.'<br>';  ;
      $elem = fopen("milton.txt", 'r');
      $lineNumber = 1;
      
      while ($line = fgets($elem)){
          echo $lineNumber++ . ": $line.<br>";
      }
      fclose($elem);
      
      echo '<h6>Leer y escribir archivos completos</h6>';
      echo 'Estas funciones al leer archivos completos hay que vigilar el tamaño de estos'.'<br>'.'<br>';
      echo 'File() lee el archivo y devuelve el contenido en una tabla, donde cada línea es un elemento.'.'<br>'.
              'El carácter de línea nueva permanece al final de cada línea.'.'<br>';
      echo 'La función abre automáticamente,lee y cierra el archivo.'.'<br>';
      echo 'Se pueden pasarindicadores útiles como segundo parámetro.'.'<br>'.
              'FILE_USE_INCLUDE_PATH => Busca el arcivo en la ruta indicada en la directiva de ini.php => include_path = ".;/php/includes";.'.'<br>'.
              'FILE_IGNORE_NEW_LINES => Elimina los carácteres de nueva líne'.'<br>'.
              'FILE_SKIP_EMPTY_LINES => Ignora las lineas vacías del archivo.'.'<br>';
      $lines = file("file.txt", FILE_USE_INCLUDE_PATH | FILE_SKIP_EMPTY_LINES);
      echo 'Leemos la primer línea: '.$lines[0].'<br>';
      foreach ($lines as $y){
          echo $y.'<br>';
      }
      echo '<br>';
      echo 'También podemos traer un archivo desde un host remoto.'.'<br><br>';
      /*
      $conte = file('../../proyecto2/index.html');
      foreach($conte as $cont){
          echo $cont;
      }
      */
      
      echo 'File_get_contents() Devuelve el contenido del archivo en una sola línea.'.'<br>'.
              'Se le pueden pasar FILE_USE_INCLUDE_PATH'.'<br>'.
              'además de parámetros por donde empezar y acabar a leer archivos.Ejemplo'.'<br>'.
              '$fileContents = file_get_contents("myArchive.txt",null,null,17,23)'.'<br>'.'<br>';
      
      echo'File_put_contents() Coje una cadena y la escribe en el archivo.'.'<br>'.
              'La función devuelve el número de carácteres escritos o false en caso d eproblemas.'.'<br>'.
              'Además de los indicadores vistos, file_put_contents() admite dos indicadores más:'.'<br>'.
              'FILE_APPEND => Si el archivo ya existe, anexa la cadena al final del archivo, en lugar de sobreescribirlo'.'<br>'.
              'LOCK_EX => Bloquea el archivo antes de escribir en él. Esto permite asegurarse de que otros procesos no ueden escribir e él.'.'<br>'.'<br>';
      
      
      echo 'Fpassthru() y readFile() nos muestran nos muestran los contenidos no modificados directamente en el navegador.'.'<br>'.
              'Ambas funciones devuelven el número de carácteres leidos, o false si hubo un problema.'.'<br>';
      echo'fpassthru() requiere que el archivo este abierto.'.'<br>';
      $fi = fopen('file.txt', 'r');
      echo 'El número es: '.$numChars = fpassthru($fi).'<br>';
      fclose($fi);
      echo 'readfile() actúa sobre archivos no abiertos.'.'<br>';
      echo 'El número es: '.readfile('milton.txt').'<br>';
      echo'***********************************'.'<br>';
      
      
      echo '<h5>Comprobar el final de un archivo </h5>';
      echo 'Feof() devuelve true cuando el puntero llega al final del archivo o ocurre un error'.'<br>'.
           'Esto ocurre cuando se lee más alla de la última letra.'.'<br>';
      $hello = fopen("hello_world.txt", 'r');
      $leido = fread($hello, 13);
      echo $leido.' Ahora el punero esta al final, y pasamos la funcion feof()'.'<br>';
   
      echo 'feof() devuelve '.feof($hello).'.' .'<br>';
      echo 'Pasamos en bucle while utilizando feof().'.'<br>';
      $txt = fopen("hello_world.txt", 'r');
      $contenido = "";
      
      while(!feof($txt)){
          $contenido .= fread($txt, 3);
      }
      
      echo $contenido.'<br>';
      fclose($txt);
      echo'***********************************'.'<br>';
      
      echo '<h5>Acceso aleatorio a datos de archivo</h5>';
      echo 'Mover el indicador de posición d eun archivo'.'<br>';
      echo 'fseek() => Reposiciona el indicador de posición en un punto especificado en el archivo.'.'<br>'.
              'Devuelve 0 si el posicionamiento ha sido correcto o -1  si hubo un problema.'.'<br>';
      echo 'rewind() => Mueve el indicador del archivo al inicio del archivo'.'<br>';
      echo 'ftell() => Devuelve la posición actual del indicador del archivo'.'<br>';
      $hell = fopen('hello_world.txt', 'r');
      fseek($hell, 7); //posicionamos puntero en el carácter posición 7
      echo fread($hell, 5).'<br>';
      fclose($hell);
      echo 'Para especificar cómo se calcula el desplazamiento se tiene que añadir un tercer argumento opcional: '.'<br>';
      echo 'SEEK_SET => Establece el indicador al principio del archivo más el desplazamiento indicado. Prederminado.'.'<br>';
      echo 'SEEK_CUR => Establece el indicador en la posición actual más el desplazamiento especificado.'.'<br>';
      echo 'SEEK_END => Establece el indicador al final del archivo más el desplazamiento especificado. Se utiliza un desplazamiento negativo'.'<br>';
      echo'***********************************'.'<br>';
      
      
      echo "<h5>Leer archivos CSV, Comma-Seprareted-Value</h5>";
      echo "En los archivos CSV cada registro de datos tiene su propia línea,".'<br>'.
           " y los campos en cada registro se separan por comas. Los valores de cadena se situan entre comillas dobles.".'<br>';
      echo "Carlos","Neira", 45 .'<br>';
      echo "Pedro", "Salgado", 30 .'<br>';
      echo '<br>';
      echo 'Fgetcsv() lee una línea de datos con formato csv, empezando en el índice del puntero y situando los datos en una tabla.'.'<br>'.
              'Opcionalmente se le puede indicar: '.'<br>';
      echo 'El número máximo de carácteres a leer. Puede poner 0, donde PHP lee  la línea entera.'.'<br>';
      echo 'El delimitador que se usara para separar cada valor de datos. Lo predeterminado es la coma.'.'<br>'.
              'Para archivos separados por tabulación /t (TSV, Tab-Separation-Value) habrá que poner un /t'.'<br>';
      echo 'El carácter que se utiliza para englobar valores de cadena. Predeterminado "" '.'<br>';
      echo "El carácter utilizado pra escapar carácteres especiales. Predeterminado \\".'<br>';
      echo "Fgetcvs() devuelve false si hubo un problema al leer la línea.".'<br>';
      $dat = fopen("archivo.csv", 'r');
      while($info = fgetcsv($dat, 0)){
          echo "Nombre: {$info[0]}  {$info[1]}, Edad: {$info[2]}".'<br>'; 
      }
      fclose($dat);
      echo'***********************************'.'<br>';
      
      
      echo '<h5>Permisos de archivos</h5>';
      echo 'chmod() cambia los permisos de un archivo'.'<br>';
      echo 'chmod() devuelve true si el cambio ha sido correcto o false si no'.'<br>';
      echo "chmod('myArchivo.txt', 0644);".'<br>'; //El cero es para indicrle a PHP que trate el número como octal
      echo 'El primer dígito es para el propietario.'.'<br>';
      echo 'El segundo es para el grupo al que pertenece el usuario'.'<br>';
      echo 'El tercer dígito es para el resto'.'<br>';
      echo '0 => No puede leer, escribir en él o ejecutar el archivo'.'<br>';
      echo '1 => Sólo puede ejecutar el archivo.'.'<br>';
      echo '2 => Sólo puede escribir el archivo.'.'<br>';
      echo '3 => Puede escribir y ejecutar el archivo.'.'<br>';
      echo '4 => Sólo puede leer el archivo'.'<br>';
      echo '5 => Puede leer y ejecutar el archivo.'.'<br>';
      echo '6 => Puede leer y escribir el archivo.'.'<br>';
      echo '7 => Puede leer, escribir y ejecutar el archivo.'.'<br>';
      echo '<br>';
      
      echo 'Comprobar los permisos del archivo.'.'<br>';
      echo 'is_readable(), is_writable(), is_executable() devuelven true si la operación es permitida.'.'<br>';
      if(is_readable('milton.txt')){
          echo 'I can read milton.txt'.'<br>';
      } else {
          echo 'I can not read it'.'<br>';
      }
      if (is_writable('milton.txt')){
          echo 'I can write it'.'<br>';
      }
      if(is_executable('milton.txt')){
          echo 'I can execute it'.'<br>';
      }

      echo 'Fileperms() devuelve un entero que representa los permisos que están establecidos'.'<br>';
      echo substr(sprintf("%o", fileperms('prueba.txt')),-4 ).'<br>';
      echo'***********************************'.'<br>';
      
      echo '<h5>Copiar, renombrar y eliminar archivos.</h5>';
      echo 'Estos métodos dan un aviso de error si los archivos no existen.Primero comprobarlo con file_exists()'.'<br>';
      echo '<br>';
      echo 'Copy() toma dos argumentos, el primero la ruta del archivo a copiar y el segundo la ruta donde copiarlo.'.'<br>'.
            'Devuelve true en caso afirmativo o false si hubo un problema.'.'<br>';
      echo 'Se ha tenido '.copy('./prueba.txt', 'test.txt'). ' al copiar prueba.txt'.'<br>';
      
      echo 'Rename() se utilia para renombrar o mover un archivo.Funciona igual que copy().'.'<br>';
      echo 'Se ha tenido '.rename('./test.txt', 'test.dat'). ' al renombrar test.dat'.'<br>';
      
      echo 'Unlik() permite eliminar archivos del servidor.'.'<br>';
      echo 'Se ha tenido '.  unlink('./test.dat'). ' al eliminar test.dat.'.'<br>';
      
        ?>
    </body>
</html>
