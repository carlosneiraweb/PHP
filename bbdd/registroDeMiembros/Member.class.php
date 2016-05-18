<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt Members.class.php
 * @fecha 29-abr-2016
 */

require_once 'DataObject.class.php';

class Member extends DataObject{
    
    protected $data = array(
        
        "id" => "",
        "username" => "",
        "password" => "",
        "firstname" => "",
        "lastname" => "",
        "joindate" => "",
        "gender" => "",
        "favoritegenre" => "",
        "emailaddress" => "",
        "otherinterests" =>""
        );
    
    private $_genres = array(
      
        "crime" => "Crime",
        "horror" => "Horror",
        "thriller" => "Thriller",
        "romance" => "Romance",
        "sciFi" => "SciFi",
        "adventure" => "Adventure",
        "nonFiction" => "Non-Fiction"
        
    );
    
    /**
     * Metodo publico y statico
     * Recive tres parametros
     * @param type $startRow, por donde empezar
     * @param type $numRows, numero de filas
     * @param type $order, orden
     * @return type
     */
    public static function getMembers($startRow, $numRows, $order){
       
        $con = parent::connect();
        
        //SQL_CALC_FOUND_ROWS => Para saber el número de filas devueltas si no se 
        //hubiera aplicado un limit
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ".TBL_MEMBERS." ORDER BY $order LIMIT :startRow, :numRows";
     
        
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":startRow", $startRow, PDO::PARAM_INT);
            $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
            $st->execute();
            $members = array();
            
            foreach ($st->fetchAll() as $row){
             
                $members[] = new Member($row);
             
            }
           
            //founds_rows() va junto con SQL_CALC_FOUND_ROWS
            //Se utiliza para recuperar el valor de SQL_CALC_FOUND_ROWS
            //en la select anterior una vez relaizada esta.
            $st = $con->query("SELECT found_rows()  AS totalRows");
            $row = $st->fetch();
           
            parent::disconnect($con);
            return array($members, $row["totalRows"]);
        } catch (Exception $ex) {
                parent::disconnect($con);
                die("Query failed: ". $ex->getMessage());
        }
        
    //fin getMembers    
    }
    
    /**
     * Metodo public and static
     * Recived one param,
     * @param type $id
     * @return \Member
     */
    public static function getMember($id){
        
        $con = parent::connect();
        $sql = "SELECT * FROM ".TBL_MEMBERS." WHERE id = :id";
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $row = $st->fetch();
            parent::disconnect($con);
            
            if($row) return new Member($row);
        } catch (Exception $ex) {
            echo $ex->getLine();
            parent::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
        
    //fin getMember
    }
    /**
     * public and static
     * Metodo que devuelve un usuario por nombre
     * @param type $username
     * @return \Member
     */
    public static function getByUsername($username){
        
        $con = parent::connect();
        $sql = "Select * FROM ".TBL_MEMBERS. " WHERE  username = :username";
        
        try{
            $st = $con->prepare($sql);
            $st ->bindValue(":username", $username, PDO::PARAM_STR);
            $st ->execute();
            $row = $st->fetch();
            if($row) return new Member($row);
        } catch (Exception $ex) {
            echo $ex->getFile();
            echo '<br>';
            echo $ex->getLine();
            parent::disconnet($con);
            die("Query failed: ".$ex->getMessage());
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
        
        $con = parent::connect();
        $sql = "SELECT * FROM ".TBL_MEMBERS." WHERE emailAddress = :emailaddress";
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":emailaddress", $emailAddress, PDO::PARAM_STR);
            $st->execute();
            $row = $st->fetch();
            parent::disconnect($con);
            if($row) return new Member($row);    
        } catch(Exception $ex) {
            parent::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
        
    //fin getByEmailAddress    
    }
    
    
    
    /**
     * Metodo publico
     * Return the gender
     * @return type
     */
    public function getGenderString(){
       
        return ($this->data["gender"] == "f") ? "Female" : "Male";
    
    //fin Member    
    }
    
    /**
     * Metodo public
     * Return FavoriteGenreString
     * @return type
     */
    public function getFavoriteGenreString(){
    return ($this->_genres[$this->data["favoritegenre"]]);
    
    }

    /**
     * Metodo publico 
     * 
     * @return type gGenders
     */
    public function getGenders(){
        return $this->_genres;
    }
    
    /**
     * Metodo public
     * insert object
     */
    public function insert(){
        
        $con = parent::connect();
        $sql = "INSERT INTO ".TBL_MEMBERS. "(
            
            username,
            password,
            firstname,
            lastname,
            joindate,
            gender,
            favoritegenre,
            emailaddress,
            otherinterests
             
            ) VALUES (
            :username,
            password(:password),
            :firstname,
            :lastname,
            :joindate,
            :gender,
            :favoritegenre,
            :emailaddress,
            :otherinterests
            
            )";
        
        try{
            
            $st = $con->prepare($sql);
            $st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
            $st->bindValue(":password", $this->data["password"], PDO::PARAM_STR);
            $st->bindValue(":firstname", $this->data["firstname"], PDO::PARAM_STR);
            $st->bindValue(":lastname", $this->data["lastname"], PDO::PARAM_STR);
            $st->bindValue(":joindate", $this->data["joindate"], PDO::PARAM_STR);
            $st->bindValue(":gender", $this->data["gender"], PDO::PARAM_STR);
            $st->bindValue(":favoritegenre", $this->data["favoritegenre"], PDO::PARAM_STR);
            $st->bindValue(":emailaddress", $this->data["emailaddress"], PDO::PARAM_STR);
            $st->bindValue(":otherinterests", $this->data["otherinterests"], PDO::PARAM_STR);
            
            $total = $st->execute();
            echo 'total campos: '.$total.'<br>';
           
            parent::disconnect($con);
        } catch (Exception $ex) {
            parent::disconnect($con);
            echo 'El error se produce en la línea: '.$ex->getLine().'<br>';
            echo 'Del archivo: '.$ex->getFile();
            echo'<br>';
            echo $ex->getCode().'<br>';
            die("Query failed: ".$ex->getMessage());
        }
            
        
        
        
    //fin insert    
    }

    /**
     * Metodo public
     * 
     * @return \Member
     */
   public function authenticate(){
       
       $con = parent::connect();
       $sql = "Select * FROM ".TBL_MEMBERS. " WHERE username = :username AND password = password(:password)";
       try{
          
            $st= $con->prepare($sql);
            $st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
            $st->bindValue(":password", $this->data["password"], PDO::PARAM_STR);
            $st->execute();
            $row =  $st->fetch();
           // echo "resultado $row[0]br>";
           parent::disconnect($con);
           if($row) return new Member($row);
       } catch (Exception $ex) {
           echo $ex->getCode();
           echo '<br>';
           echo $ex->getLine();
           parent::disconnect($con);
           die("Query failed: ".$ex->getMessage());
       }
       
  //fin authenticate     
   }
   
   /**
    * Metodo public
    * update
    */
   public function update(){
       
       $con = parent::connect();
       $passwordSql = $this->data["password"] ? "password = password(:password), "  : "";
      
       $sql = "UPDATE ".TBL_MEMBERS. " SET "
               . "id = :id, "
               . "username = :username, "
               . $passwordSql 
               . "firstname = :firstname, "
               . "lastname = :lastname, "
               . "joindate = :joindate, "
               . "gender = :gender, "
               . "favoritegenre = :favoritegenre, "
               . "emailaddress = :emailaddress, "
               . "otherinterests = :otherinterests "
               . " WHERE id = :id";
        echo $sql.'<br>';           
     
        try{
            $st = $con->prepare($sql);
           
            $st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
            if($this->data["password"]) $st->bindValue(":password", $this->data["password"], PDO::PARAM_STR);
            $st->bindValue(":firstname", $this->data["firstname"], PDO::PARAM_STR);
            $st->bindValue(":lastname", $this->data["lastname"], PDO::PARAM_STR);
            $st->bindValue(":joindate", $this->data["joindate"], PDO::PARAM_STR);
            $st->bindValue(":gender", $this->data["gender"], PDO::PARAM_STR);
            $st->bindValue(":favoritegenre", $this->data["favoritegenre"], PDO::PARAM_STR);
            $st->bindValue(":emailaddress", $this->data["emailaddress"], PDO::PARAM_STR);
            $st->bindValue(":otherinterests", $this->data["otherinterests"], PDO::PARAM_STR);
             $st->bindValue(":id", $this->data["id"], PDO::PARAM_INT);
            $st->execute();
            parent::disconnect($con);
            
        } catch (Exception $ex) {
            parent::disconnect($con);
            echo $ex->getCode();
            echo'<br>';
            //var_dump($ex->getTrace());
            die("Query failed: ".$ex->getMessage());

        }
         
    //fin update
   }
   
   /**
    * Metodo public
    * delete obj
    */
    public function delete(){
        
        $con = parent::connect();
        $sql = " DELETE FROM ".TBL_MEMBERS. " WHERE id = :id";
        
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":id", $this->data["id"], PDO::PARAM_INT);
            $st->execute();
            parent::disconnect($con);
        } catch (Exception $ex) {
            parent::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
        
        
        
    //fin delete    
    }           
       
       
 
    //fin clase
}



