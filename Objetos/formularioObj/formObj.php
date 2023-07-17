<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
           .error{background: #d33; color:white; padding: .2em;}
           .oculto{visibility: hidden;}
           .mostrar{visibility: visible;}
        </style>
    </head>
    <body>

<!--
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt formObj.php
 * @fecha 05-abr-2016
 -->
        
    <?php
        function __autoload($class){
            $class = str_replace("..", "", $class);
            require_once("./$class.php");
        }
    /**
     * Creamos una clase que hereda
     * de la clase que nos va a permitir 
     * validar el formulario.
     * Mandamos a la clase principal los dos arrays necesarios.
     * $a = Campos Obligatorios
     * $b = Campos perdidos o no rellenados
     */    
    class formObj extends Validate {
         public function __construct($a,$b){
         parent::__construct($a,$b);
         } 
    } 
    
    /**
     * Recojemos los datos de la url
     */
    if(isset($_POST["submitButton"])){
        //Si se pulsa boton se procesa el formulario
            processForm();
        }else{
        //Si no se ha pulsado el boton de enviar se muestra por primera vez el formulario 'vacio'
        //Se instancia un objeto para que las comprobaciones no den error
            global $obj;
            $obj = new formObj(array(), array());
            displayForm(array());
        }   
    
    function processForm(){
           
             //Secrea un array con los campos requeridos
            $camposRequeridos = array("firstName","password1","password2", "gender","condiciones");
            //Array para almacenar los campos no rellenados y obligatorios
            $noRecividos = array();
                 
            foreach($camposRequeridos as $requiredField){
                if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
                    $noRecividos[] = $requiredField;
                }
            }
       global $obj;
       $obj = new formObj($camposRequeridos,$noRecividos);
            if(count($obj->getPerdidos()) != 0){
              displayForm($noRecividos);
              $obj->comprobarCheck('condiciones');
            }else{
                displayThanks();
            }
           
       //fin processForm     
        }
    
    function displayForm($missingFields){
        global $obj;
        
        echo'<form action="formObj.php" method="post">';
        echo'<div style="width:30em;">'.'<br>';
        echo"<label ".$obj->validateField('firstName', $missingFields)." for='firstName'>FirstName *</label><br>";
        echo"<input type='text' name='firstName' id='firstName' value= ".$obj->setValue('firstName')."><br/><br/>";
        echo"<label ".$obj->validateField('password1', $missingFields)." for='password1'>Choose a password * </label><br/>";
        //A los metodos password no se les aplica $obj->setValue por seguridad
        echo"<input type='password' name='password1' id='password1' value=''/><br/><br/>";
        echo"<label ".$obj->validateField('password2', $missingFields)." for='password2'>Retype password *</label><br/>";
        echo"<input type='password' name='password2' id='password' value=''/><br/>";
        echo'<br/>';        
        
        echo"<label ".$obj->validateField('gender', $missingFields).">Your gender: *</label><br/>";
        echo"<label for='genderMale'>Male</label>";
        echo"<input type='radio' name='gender' id='genderMale' value='M'".$obj->setChecked('gender','M')."/><br/>";
        echo"<label for='genderFemale'>Female</label><br/>";
        echo"<input type='radio' name='gender' id='genderFemale' value='F'".$obj->setChecked('gender','F')."/><br/>";
        echo"<br/>";
        
        echo"<label for='favoriteWidget'>What's your favorite widget? *</label><br/>";
        echo"<select name='favoriteWidget' id='favoriteWidget' size='1'><br/>";
            echo"<option value='superWidget'".$obj->setSelected('favoriteWidget', 'superWidget').">The superWidget</option>";
            echo"<option value='megaWidget'".$obj->setSelected('favoriteWidget', 'megaWidget').">The MegaWidget</option>";
            echo"<option value='wonderWidget'".$obj->setSelected('favoriteWidget', 'wonderWidget').">The WonderWidget</option>";
        echo"</select>";
        echo"<br/>";
        
        echo"<label for='newsletter'>Do you want to receive our newsletter?</label>";
        echo"<input type='checkbox' name='newsletter' id='newsletter' value='yes'".$obj->setChecked('newsletter', 'yes')."/><br/>";
        echo"<br/>";
        
        echo"<label ".$obj->validateField('condiciones', $missingFields)." for='condiciones'>Aceptas nuestras condiciones</label>";
        echo"<label for='Si'>Si</label>";
        echo"<input type='checkbox' name='condiciones' id='si' value='1'>  ";
        echo"<label for='No'>No</label>";
        echo"<input type='checkbox' name='condiciones' id='no' value='2'><br><br> ";
        
        
        
        echo'<div style="clear:both;">';
            echo'<input type="submit" name="submitButton" id="submitButton" value="Send Details"/>';
            echo'<input type="reset" name="resetButton" id="resetButton" value="Reset Button" style="margin-right: 20px;"/><br>';
        echo'</div>';
        
 
        echo'</form>';
        //unset($obj);
        echo '</body>';
        echo ' </html>';
    
   //fin display form             
   }
    
    function displayThanks(){
       
        echo'<h1>Thank You</h1>';
        echo'<p>Thank you, your application has been received</p>';
        echo '</body>';
        echo ' </html>';

    }
    
    
  
    
   