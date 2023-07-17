<?php

require_once("../../Connexion/ConstantesBbdd.php");





/**
 * Description of Usuarios
 * Esta clase extiende DataObj
 * Crea usuarios y dispone de varios metodos para 
 * insertar, actualizar o borrar un obj de Usuarios
 */ 

//extends DataObj
class Usuarios {

    protected $data = array(
            "nombre" => "",
            
        );
    
        public function __construct($data) {
            $this->data = $data;
        }

        
     /**
      *
      * Metodo static que recibe un id <br/>
      * nos devuelve un usuario <br/>
      * @param  $id del usuario
      * @return Un Objeto usuario Usuario
      */
    public static function getMember($id){
        
        $con =  Conne::connect();
        $sql = "SELECT * FROM ".TBL_USUARIO." WHERE id = :id";
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $row = $st->fetch();
            $st->closeCursor();
            Conne::disconnect($con);
            
            if($row){return new Usuarios($row);}
        } catch (Exception $ex) {
            echo $ex->getLine().'<br>';
            echo $ex->getFile().'<br>';
            Conne::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
        
    //fin getMember
    }
    
     
    /**
     * Metodo que recive un nick<br/>
     * y comprueba si esta en la bbdd.<br/>
     * @param nick <br>
     * String
     * @return objeto usuario
     */

    public static function getByUsername($nick){
        
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
     * public and static
     * Metodo que devuelve un usuario por
     * por un email recivido
     * @param type $emailAddress
     */
    public static function getByEmailAddress($emailAddress){
        
        $con = Conne::connect();
        $sql = "SELECT * FROM ".TBL_USUARIO." WHERE email = :emailaddress";
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":emailaddress", $emailAddress, PDO::PARAM_STR);
            $st->execute();
            $row = $st->fetch();
            $st->closeCursor();
            Conne::disconnect($con);
            if($row){return new Usuarios($row);}    
        } catch(Exception $ex) {
            Conne::disconnect($con);
            echo $ex->getLine().'<br>';
            echo $ex->getFile().'<br>';
        }
        
    //fin getByEmailAddress    
    }
    
  
   
    


/**
 * Metodo que inserta en la bbdd un usuario
 */    
public final function insert(){
    
    $con = Conne::connect();
    $idUsu;
    
    
    
        try{
        
        $sql = "INSERT INTO ".TBL_USUARIO. "(
            
            nick
           
            
                   
            ) VALUES (
            :nick
            
            );";
           
        
        
        $con->beginTransaction();
        
        
        
            $date = date('Y-m-d');
            $st = $con->prepare($sql);
            $st->bindValue(":nick", $this->data["nick"], PDO::PARAM_STR);
            

                $st->execute(); 
                $idUsu = $con->lastInsertId();
                
                 
                
                $sqlDireccion = "INSERT INTO ".TBL_DIRECCION." (idDireccion,codigoPostal, ciudad)".
                    " VALUES ".
                        "(:idDireccion, :codigoPostal, :ciudad);";
                                    
                             
                        $stDireccion = $con->prepare($sqlDireccion);
                        $stDireccion->bindValue(":idDireccion", $idUsu, PDO::PARAM_INT);
                        $stDireccion->bindValue(":codigoPostal", $this->data["codigoPostal"], PDO::PARAM_STR);
                        $stDireccion->bindValue(":ciudad", $this->data["ciudad"], PDO::PARAM_STR);
                       
                        
                $stDireccion->execute();             

              
                
                
            
            $con->commit();
            Conne::disconnect($con);
            
                return $idUsu;
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
           
        }
        
    //fin insert    
} 
   
  
/**
 * Metodo que elimina un usuario por su id <br>
 * @param id <br>
 * String con el id del usuario a eliminar.
 * @return name $test<br/>
 * Resultado de la acción
 */
 public function eliminarPorId($id){
    
    $con = Conne::connect();
    $con->beginTransaction();
    
    $sql = " DELETE FROM ".TBL_USUARIO. " WHERE idUsuario = :idUsuario";

        try{
            
            $st = $con->prepare($sql);
            $st->bindValue(":idUsuario", $id, PDO::PARAM_INT);
            $test = $st->execute();
            
            $con->commit();
            Conne::disconnect($con);
            return $test;
            
        } catch (Exception $ex) {
            
            $con->rollBack();
            echo $ex->getMessage();
           
        }
     
     
  //fin eliminarPorId   
 }
    
 
 
    /**
     * Metodo publico que recive
     * el nick de un usuario y nos devuelve el id
     *  @return type id usuario
     */

    public  function devuelveId(){
        $con = Conne::connect();
        
        try{
            
            $sql = "Select idUsuario from ".TBL_USUARIO. " WHERE nick = :nick";
          
                $st = $con->prepare($sql);
                $st->bindValue(":nick", $this->getValue('nick'), PDO::PARAM_STR);
                $st->execute();
                $row = $st->fetch();
                
                if($row){return $row[0];}
                $st->closeCursor();
                
                Conne::disconnect($con);
                
        } catch (Exception $ex) {
            Conne::disconnect($con);
            echo $ex->getLine().'<br>';
            echo $ex->getFile().'<br>';
            die("Query failed: ".$ex->getMessage());
        }
   //fin devuelve id     
}
    

    


/**
 * Metodo que devuelve la direcion <br/>
 * de un susuario <br/>
 * @return array direccion <br/>
 */

public function retornoDireccionUsuario(){
    
    $conDireccion = Conne::connect();
        
        try{

            $sqlBloqueo = "Select codigoPostal, ciudad
            from direccion where idDireccion = :usuario_idUsuario;";

            $stmDireccion = $conDireccion->prepare($sqlBloqueo);
            $stmDireccion->bindValue(":usuario_idUsuario", $this->devuelveId());
            $stmDireccion->execute();
            $direccion = $stmDireccion->fetchAll();
           
            Conne::disconnect($conDireccion);
            
            return $direccion;
            
        } catch (Exception $ex) {
            Conne::disconnect($conBloqueo);
            echo $ex->getCode();
            echo '<br>';
            echo $ex->getLine().'<br>';
            echo $ex->getFile().'<br>';
        }

    
    
//fin devuelvoDireccion    
}  
  


    
    




    
//fin Usuarios    
}
