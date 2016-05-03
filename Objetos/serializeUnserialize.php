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
        
        //serialize() Convierte un objeto, propiedades, métodos en una cadena de texto
        //unserialize() Toma una cadena creada por serialize() y la convierte a un objeto
        //__sleep()Nos permite relizar una acción antes de serializar
        //_wakeup()Nos perite realizar algo cuando se deserializa
        //No es aconsejable transmitir información sensible
        class Person{
            public $age;
        }
        /*
        $harry = new Person();
        $harry->age = 28;
        $string = serialize($harry);
        echo 'Mostramos objeto serializado: '.$string;
        echo 'Desserializamos $harry'.'<br>';
        $obj = unserialize($string);
        echo "La edad es: ".$obj->age;
        */
        class User{
            public $username;
            private $password; //propiedades privadas no
            public $loginsToday;
            
            public function __sleep(){
                //Ordenar, cerrar indicadores de bbdd
                return array("username", "password");
        }
        //clase
        }    
         $user = new User();
         $user->username = 'carlos';
         $user->assword = 123;
         $user->loginsToday = 3;
         echo 'El objeto original <br>';
         var_dump($user);
         echo '<br>';
         echo 'Serializamos el objeto';
         $userString = serialize($user);
         echo 'El objeto serializado es:'.'<br>';
         echo $userString;
         echo 'Desserializmos el objeto.'.'<br>';
         $obj = unserialize($userString);
         echo 'El objeto deserializado: '.'<br>';
         print_r($obj);
            
            
        
        
        
        ?>
    </body>
</html>
