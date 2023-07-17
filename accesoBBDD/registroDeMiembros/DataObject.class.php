<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt DataObject.class.php
 * @fecha 29-abr-2016
 */

require_once "config.php";


abstract class DataObject  {

    protected  $data = array();
    

    /**
     * Constructor public
     * @param type $data
     */
    public function __construct($data){
       
        
        foreach ($data as $k => $v){
           // echo 'Clave: '.$k. ': valor: '.$v.'<br>';
            if(array_key_exists($k, $this->data)){ //si $k existe en la tabla data, important!!!           
                $this->data[$k] = $v;
            }
            //xdebug_debug_zval( 'data' );
        }
    }
   
    
    /**
     * metodo public
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
     * Metodo public
     * Metodo usado para devolver el valor de un campo
     * pedido por codigo externo.
     * Evitamos codigo malicioso
     * @param type $field
     * @return type
     */
    public function getValueEncoded($field){
        return htmlspecialchars($this->getValue($field));
    }
    
    /**
     * Metodo protected
     * connect
     * @return \PDO
     */
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
    
    /**
     * Metodo protected
     * disconnect
     * @param string $con
     */
    protected function disconnect($con){
        //Ojo no eliminamos la conexion
        $con="";
    }
    
    /**
     * public function
     */
    
    public function publico(){
        echo 'publico<br>';
    }
    /**
     * metodo de estatico
     */
    public static function estatico(){
        
        echo 'statico<br>';
    }
    
    /**
     * metodo protected
     */
    protected function protegido(){
        echo 'protegido<br>';
    }
    
    /**
     * metodo privado
     */
    private function privado(){
        echo 'privado<br>';
    }
//fin clase     
}

