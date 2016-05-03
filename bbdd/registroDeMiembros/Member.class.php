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
        "joinDate" => "",
        "gender" => "",
        "favoriteGenre" => "",
        "emailAddress" => "",
        "otherInterest" =>""
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
    
    public static function getMembers($startRow, $numRows, $order){
        $con = parent::connect();
        
        //SQL_CALC_FOUND_ROWS => Para saber el número de filas devueltas si no se 
        //hubiera aplicado un limit
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ".TBL_MEMBERS." ORDER BY $order LIMIT ?,?";
     
        
        try{
            $st = $con->prepare($sql);
            $st->bindValue(1, $startRow, PDO::PARAM_INT);
            $st->bindValue(2, $numRows, PDO::PARAM_INT);
            $st->execute();
            $members = array();
            
            foreach ($st->fetchAll() as $row){
           
                $members[] = new Member($row);
            }
            
            //founds_rows() va junto con SQL_CALC_FOUND_ROWS
            $st = $con->query("SELECT found_rows()  AS totalRows");
            $row = $st->fetch();
            //echo 'Total: '.$row[0].'<br>';
            parent::disconnect($con);
            return array($members, $row["totalRows"]);
        } catch (Exception $ex) {
                parent::disconnect($con);
                die("Query failed: ". $ex->getMessage());
        }
        
    //fin getMembers    
    }
    
    
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
            parent::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
        
    //fin getMember
    }
    /**
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
            parent::disconnet($con);
            die("Query failed: ".$ex->getMessage());
        }
   //fin getByUsername
    }
    
    /**
     * Metodo que devuelve un usuario por
     * por un email recivido
     * @param type $emailAddress
     */
    public static function getByEmailAddress($emailAddress){
        
        $con = parent::connect();
        $sql = "SELECT * FROM ".TBL_MEMBERS." WHERE emailAddress = :emailAddress";
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":emailAddress", $emailAddress, PDO::PARAM_STR);
            $st->excute();
            $row = $st->fetch();
            parent::disconnect($con);
            if(row) return new Member($row);    
        } catch(Exception $ex) {
            parent::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
        
    //fin getByEmailAddress    
    }
    
    
    
    
    public function getGenderString(){
        return ($this->data["gender"] == "f") ? "Female" : "Male";
    
//fin Member    
}

    public function getFavoriteGenreString(){
        return ($this->_genres[$this->data["favoriteGenre"]]);
    }

    public function getGenders(){
        return $this->_genres;
    }
    
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
            :password(:password),
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
            $st->bindValue(":otherInterest", $this->data["otherinterests"], PDO::PARAM_STR);
            $st->execute();
            
            parent::disconnect($con);
        } catch (Exception $ex) {
            parent::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
            
        
        
        
    //fin insert    
    }

    
    //fin clase
}

