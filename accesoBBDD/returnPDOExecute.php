<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Changes/Sistema/Constantes/ConstantesBbdd.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Changes/Sistema/Constantes/ConstantesErrores.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Changes/Modelo/DataObj.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Changes/Sistema/Email/mandarEmails.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Changes/Sistema/System.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/Changes/Sistema/Conne.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Changes/Controlador/Validar/MisExcepcionesUsuario.php');






                    /**METODO SELECT**/


  function getByUsername($nick){
        
        $con = Conne::connect();
        $sql = "Select * FROM ".TBL_USUARIO. " WHERE  nick = :nick";
        
        try{
            $st = $con->prepare($sql);
            $st ->bindValue(":nick", $nick, PDO::PARAM_STR);
            $st ->execute();
            $row = $st->fetch();

            if($row){ return new Usuarios($row);}
            $st->closeCursor();
            Conne::disconnect($con);
        } catch (Exception $ex) {
            echo $ex->getFile();
           
            echo $ex->getCode();
            echo '<br>';
            echo $ex->getLine();
            Conne::disconnet($con);
        }
   //fin getByUsername
    }


    
    /**
    $user = getByUsername("carlos");
    if (getByUsername("carlos")){
        echo "si";
    }else{
        echo "no";
    }
    var_dump($user);
    
    
     * Si se le pasa nick correcto
     * 
     * total filas 1
     *   object(Usuarios)#4 (1) { ["data":protected]=> array(20) { ["nombre"]=> string(0) "" } } 

     * 
     * Si se le pasa nick incorrecto
     *     
     *  total filas 0
     *   NULL
     */
    
    
    /*****************METODO DELETE******************/
    
    function eliminarPorId($id){
    
    $con = Conne::connect();
   
    
    $sql = " DELETE FROM ".TBL_USUARIO. " WHERE idUsuario = :idUsuario";

        try{
            
            $st = $con->prepare($sql);
            $st->bindValue(":idUsuario", $id, PDO::PARAM_INT);
            $test = $st->execute();
            $total = $st->rowCount();
            
            echo " test dice $test y total filas $total";
          
            Conne::disconnect($con);
           
            
        } catch (Exception $ex) {
            
         
            Conne::disconnect($con);
            
           
        }
     
     
  //fin eliminarPorId   
 }
 
 /**
   * eliminarPorId(66);
  *
  * 
  * 
  * Pasando un id que no existe
  * test dice 1 y total filas 0
  * 
  * Pasando un id que existe
  * test dice 1 y total filas 1
  * 
  * Si no usamos sentencias preparadas
  * podemos usar $con->exec() para sentencias sin devolucion de datos
  * $con->query() para sentencias con devolucion de datos
  * Este devuelve directamente el número de filas 
  * afectadas.
  * 
  * 
  */
 
 
 
 
                    ///////////////METODO UPDATE//////////////////////
 
 function update($id){
     
     
     try{
 
      

         $con = Conne::connect(); 


         $sqlValiEmail = "Update ".TBL_USUARIO. " SET bloqueado = :bloqueado, fecha = :fecha WHERE  idUsuario = :idUsuario";
         $stmValiEmail = $con->prepare($sqlValiEmail);
         $stmValiEmail->bindValue(":bloqueado", 1, PDO::PARAM_STMT);
         $stmValiEmail->bindValue(":fecha", "2023-07-02", PDO::PARAM_STMT);
         $stmValiEmail->bindValue(":idUsuario", $id, PDO::PARAM_INT);
        
         $test = $stmValiEmail->execute();
        
         $count = $stmValiEmail->rowCount();
         
         echo "test dice $test y count $count";
         

    } catch (Exception $ex) {
      
        echo $ex->getCode();
        echo $ex->getMessage();
    }    
    
    
 }
 
 
   update(97);
   
   /**
    * 
    * Pasando el mismo valor al campo
    * y un id correcto
    * 
    * test dice 1 y count 0
    * 
    * Pasandole distinto valor al campo
    * 
    * test dice 1 y count 1
    * 
    * Si mandamos modificar 2 columnas y solo modificamos 1
    * 
    * test dice 1 y count 1
    * 
    * Si las dos columnas no modifican ningun campo
    * 
    * test dice 1 y count 0
    * 
    * 
    * Si mandamos un id incorrecto
    * 
    * test dice 1 y count 0 OJO no salta excepción
    * 
    * 
    * 
    * 
    * 
    */