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
    class Animal {
        private $cuerpo;
        private $peso;
        
        public function __construct($cuerpo, $peso) {
            $this->cuerpo = $cuerpo;
            $this->peso = $peso;
            echo 'Que '.$cuerpo. 'tiene cuerpo, y su peso '.
                    ' es: '.$peso.'<br>';
        }
        /*
        public function __destruct() {
            echo '<br> El objeto aun persistira en memoria por que en el constructor <br>'.
                    ' hay una referencia a él.<br>';
        }
        */
      
        
        function getCuerpo() {
            return $this->cuerpo;
        }

        function getPeso() {
            return $this->peso;
        }

        }
        //class 
        
        class Persona extends Animal{
            private $sabiduria;
            //El constructor no es necesario
            //Solo si se va a sobreescribir la clase 
            /*
            public function __construct($cuerpo, $peso, $x) {
               $this->sabiduria = $x;
               echo 'Hemos creado un animal con : '.$this->sabiduria; 
               parent::__construct($cuerpo, $peso);
            }
             * */
             
            /*
             public function __destruct() {
                parent::__destruct();
                
            }
           */
            function getSabiduria() {
                return $this->sabiduria;
            }

            function setSabiduria($sabiduria) {
                $this->sabiduria = $sabiduria;
            }

                    //class    
        }
        //echo phpversion().'<br>';
        $y='no';
        $obj = new Persona('si', 50, $y);
        //Como podemos ver tiene una referencia
        xdebug_debug_zval( 'obj' );
        echo $obj->getSabiduria();
        $obj2 = $obj;
        xdebug_debug_zval( 'obj' );//muestra dos referencias en este contesto
        $obj= null;
        //Sigue teniendo una referencia la del constructor
        //por lo que no será liberado de la memoria
        xdebug_debug_zval( 'obj' ); 
        //forma correcta
        unset($obj);
        echo 'Devuelve false, ahora es destruido: '.xdebug_debug_zval( 'obj' ); 
        //No se necesita ni tener destructores
        
        
        
        
        ?>
    </body>
</html>
