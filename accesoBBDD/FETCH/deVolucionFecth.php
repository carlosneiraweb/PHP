<?php

require_once("../../Connexion/ConstantesBbdd.php");
require_once("../../Connexion/Conne.php");
require_once('./Usuarios.php');



/**
 * 
    PDO::FETCH_ASSOC: devuelve un array indexado cuyos keys son el nombre de las columnas.
    PDO::FETCH_NUM: devuelve un array indexado cuyos keys son números.
    PDO::FETCH_BOTH: valor por defecto. Devuelve un array indexado cuyos keys son tanto el nombre de las columnas como números.
    PDO::FETCH_BOUND: asigna los valores de las columnas a las variables establecidas con el método PDOStatement::bindColumn.
    PDO::FETCH_CLASS: asigna los valores de las columnas a propiedades de una clase. Creará las propiedades si éstas no existen.
    PDO::FETCH_INTO: actualiza una instancia existente de una clase.
    PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.
    PDO::FETCH_LAZY: combina PDO::FETCH_BOTH y PDO::FETCH_OBJ, creando los nombres de las propiedades del objeto tal como se accedieron.

 */


/**
 * Ejemplo usando fetchAll sin mode <br>
 * array(2) { [0]=> array(4) { ["idusuario"]=> int(1) [0]=> int(1) <br>
 * ["nick"]=> string(5) "pedro" [1]=> string(5) "pedro" } <br>
 * [1]=> array(4) { ["idusuario"]=> int(2) [0]=> int(2) <br>
 * ["nick"]=> string(5) "david" [1]=> string(5) "david" } }<br>
 * 
 * Ejemplo fetchAll(PDO::FETCH_ASSOC)<br>
 * array(2) { [0]=> array(2) { ["idusuario"]=> int(1) ["nick"]=> string(5) "pedro" } <br>
 * [1]=> array(2) { ["idusuario"]=> int(2) ["nick"]=> string(5) "david" } } <br>
 * 
 *                              IMPORTANTE
 * 
 * A la hora de recuperar datos hay que tener en cuenta: <br>
 * 
 * Si se usa  fetchAll sin mode<br>
 * Los recuperaremos con un bucle de un paso.<br>
 * Y accederos al contenido tanto por nombre <br>
 * de la clave como por su numero. <br>
 * 
 * Si se usa mode FETCH_ASSOC <br>
 * lo recuperaremos unicamnete por nombre.<br>
 * 
 * 
 * @param type $id
 */


function ejemplosFetchAssoc($id){
  
    $con = Conne::connect();
   
   
        $sql = "Select * FROM ".TBL_USUARIO. " where idusuario > :id;";
    
        try{
            $st = $con->prepare($sql);
            $st ->bindValue(":id", $id, PDO::PARAM_INT);
           
            $st ->execute();
           $datos = array();
           while($row = $st->fetchAll(PDO::FETCH_ASSOC)){
               
               $datos = $row;
           }
           var_dump($datos);
           foreach($datos as $a ){
              
               echo $a["idusuario"] ." ".$a["nick"]. "<br/>";
              
           }
          
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    
   
}



//ejemplosFetchAssoc(-1); 

/**
 * PDO::FETCH_BOUND
    Devuelve TRUE y asigna los valores de las columnas del conjunto de resultados<br/>
 *  a las variables de PHP a las que estaban vinculadas, <br/>
 *  osea ya no es un array
 *  con el método PDOStatement::bindParam.
 * @param type $id
 */

function ejemplosFetchBound($id){
    
    $con = Conne::connect();
        $sql = "Select idusuario, nick FROM ".TBL_USUARIO. " WHERE  idUsuario > :id;";
        
        try{
            $st = $con->prepare($sql);
            $st ->bindValue(":id", $id, PDO::PARAM_STR);
           
            $st ->execute();
            
            //Siempre vincular despues de execute
            $st->bindColumn(1, $idusuario);
            $st->bindColumn("nick", $nick);
            
            while($row = $st->fetch(PDO::FETCH_BOUND)){
                echo $nick . " : ".$idusuario."<br/>";
            }
            
          
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    

}

 //ejemplosFetchBoth(0);


/**
 * 
 * @param type $id
 */



/**
 * 
 * Devuelve objeto que podremos instanciar. <br>
 * $user = new Usuario()<br>
 * object(stdClass)#3 (2) { ["idusuario"]=> int(2) ["nick"]=> string(5) "david" } <br>
 * @param type $id
 */
function ejemplosFetchObject($id){
    
    $con = Conne::connect();
        $sql = "Select * FROM ".TBL_USUARIO. " WHERE  idUsuario > :id;";
        
        try{
           
            $st = $con->prepare($sql);
            $st ->bindValue(":id", $id, PDO::PARAM_STR);
            $st->setFetchMode(PDO::FETCH_OBJ);
            
             $st ->execute();
           
            while($row = $st->fetch()){
                //var_dump($row);
                $prueba = new Usuarios($row);
                $nick = $prueba->devuelveNick($id);
               
                echo "nick".$nick;
                
                
            } 
           
            
           
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    

}

//ejemplosFetchObject(1);


/**
 * PDO::FETCH_NUM nos devuelve un array <br>
 * cuyos indices son numeros.<br>
 * array(2) { [0]=> array(2) { [0]=> int(1) [1]=> string(5) "pedro" } <br>
 * [1]=> array(2) { [0]=> int(2) [1]=> string(5) "david" } } 
 */


function fetchNum($id){

    $con = Conne::connect();
        $sql = "Select * FROM ".TBL_USUARIO. " WHERE  idUsuario > :id;";
        
        try{
           
            $st = $con->prepare($sql);
            $st ->bindValue(":id", $id, PDO::PARAM_STR);
          
            
             $st ->execute();
           
            while($row = $st->fetchAll(PDO::FETCH_NUM)){
                var_dump($row);
                
            } 
           
            
           
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    
    
 
    
    //fin fetchNum
}


//fetchNum(0);



/**
 * PDO::FETCH_CLASS<br>
 * Devuelve una instancia de la clase<br>
 * Si no se aplica PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE<br>
 * Se asignan primeri las propiedades del objeto<br>
 * y luego se llama  al constructor.<br>
 * Si se aplica entonces al reves. 
 * 
 * 
 * @param type $id
 */


function fecthClass($id){


    $con = Conne::connect();
    
        $sql = "Select idusuario,nick,sexo  FROM ".TBL_USUARIO. " WHERE  idusuario > :idusuario;";
        
        try{
           
            $st = $con->prepare($sql);
           
            //
            $st->execute([':idusuario' => $id]);
            $st->setFetchMode(PDO::FETCH_CLASS ,'Usuarios',[$id]);
            $row = $st->fetchAll();
           
            //OJO SI DEVUELVE MAS DE UN OBJETO
            //RECUPERAMOS COMO ARRAY
            //SINO ACCEDEMOS COMO OBJETO NORMAR  $row->idusuario
            //var_dump($row);
            echo $row[0]->idusuario;
            echo "<br>";
            echo $row[0]->nick;
            echo "<br>";
            echo $row[0]->sexo;
            echo "<br>";
            echo $row[0]->saludo();
            
            

            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getPrevious();
            echo $ex->getMessage();
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    
    
    
    
    //fin fecthClass
}


fecthClass(0);
