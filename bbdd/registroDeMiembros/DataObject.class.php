<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt DataObject.class.php
 * @fecha 29-abr-2016
 */

require_once "config.php";

abstract class DataObject {

    protected  $data = array();
    
    
    //Es llamado cada vez que se hace una instancia
    //de una clase que la extienda
    public function __construct($data){
     echo $this->altura;
        foreach ($data as $k => $v){
            if(array_key_exists($k, $this->data)){ //si $k existe en la tabla data, important!!!           
                $this->data[$k] = $v;
            }
            //xdebug_debug_zval( 'data' );
        }
    }
   
    
    /**
     * Acepta un valor de campo y devuelve su valor
     * @param type $field
     * @return type
     */
    public function getValue($field){
        if(array_key_exists($field, $this->data)){
            return $this->data[$field];
        } else{
            die("Field not found");
        }
    }

    /**
     * Metodo usado para devolver el valor de un campo
     * pedido por codigo externo.
     * Evitamos codigo malicioso
     * @param type $field
     * @return type
     */
    public function getValueEncoded($field){
        return htmlspecialchars($this->getValue($field));
    }
    
    protected function connect(){
        
        try{
            $con = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_PERSISTENT, true);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die("Connection failed: ".$ex->getMessage());
        }
        return $con;
    //fin connect    
    }
    
    protected function disconnect($con){
        //Ojo no eliminamos la conexion
        $con="";
    }
//fin clase     
}

