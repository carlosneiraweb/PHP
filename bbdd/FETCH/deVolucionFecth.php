<?php

require_once('ConstantesBbdd.php');
require_once('Usuarios.php');



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


function ejemplosFetchAssoc($nick){
    
    $con = Conne::connect();
        $sql = "Select * FROM ".TBL_USUARIO. " WHERE  nick = :nick";
        
        try{
            $st = $con->prepare($sql);
            $st ->bindValue(":nick", $nick, PDO::PARAM_STR);
           
            $st ->execute();
           // $row = $st->fetch();
           // var_dump($row);
            while($row = $st->fetch(PDO::FETCH_ASSOC)){
                
                echo "idUsuario => $row[idUsuario]<br/>";
                echo "nick => $row[nick]<br/>";
                echo "password => $row[password]<br/>";
                echo "email => $row[email]<br/>";
                echo "fecha => $row[fecha]<br/>";
                echo "bloqu => $row[bloqueado]<br/>";
   
            }
            
            $st->closeCursor();
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getFile();
           
            echo $ex->getCode();
            echo '<br>';
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    
   
}



//ejemplosFetchAssoc("carlos"); 

/**
 * PDO::FETCH_BOUND
    Devuelve TRUE y asigna los valores de las columnas del conjunto de resultados<br/>
 *  a las variables de PHP a las que estaban vinculadas, <br/>
 *  osea ya no es un array
 *  con el método PDOStatement::bindParam.
 * @param type $id
 */

function ejemplosFetchBoth($id){
    
    $con = Conne::connect();
        $sql = "Select nick,email FROM ".TBL_USUARIO. " WHERE  idUsuario > :id;";
        
        try{
            $st = $con->prepare($sql);
            $st ->bindValue(":id", $id, PDO::PARAM_STR);
           
            $st ->execute();
            //devuelve array
            //$row = $st->fetch();
           // var_dump($row);
            $st->bindColumn(1, $nick);
            $st->bindColumn("email", $email);
            
            while($row = $st->fetch(PDO::FETCH_BOUND)){
                echo $nick . " : ".$email."<br/>";
            }
            
            $st->closeCursor();
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getFile();
           
            echo $ex->getCode();
            echo '<br>';
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    

}

 //ejemplosFetchBoth(0);


/**
 * 
 * @param type $id
 */


function ejemplosFetchClass($id){
    
    $con = Conne::connect();
        $sql = "Select * FROM ".TBL_USUARIO. " WHERE  idUsuario > :id;";
        
        try{
            //$usuario = array("carlos");
            $st = $con->prepare($sql);
            $st ->bindValue(":id", $id, PDO::PARAM_STR);
            //$st->setFetchMode(PDO::FETCH_OBJ);
            
            $row = $st ->execute();
           
            while($row = $st->fetch()){
                echo "sssss";
                var_dump($row);
            } 
           
            
            $st->closeCursor();
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getFile();
           
            echo $ex->getCode();
            echo '<br>';
            echo $ex->getLine();
            Conne::disconnet($con);
        }
    

}

ejemplosFetchClass(0);