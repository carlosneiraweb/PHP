<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt LogEntry.class.php
 * @fecha 29-abr-2016
 */

require_once 'DataObject.class.php';

class LogEntry extends DataObject{
    
    
    protected $data = array(
      
        "memberId" => "",
        "pageUrl" => "",
        "numVisits" => "",
        "lastAccess" => ""
    );
    /**
     * public and static
     *  
     * @param type $memberId
     * @return \LogEntry
     */
    public static function getLogEntries($memberId){
        
        
        $con = parent::connect();
        $sql =" SELECT * FROM ".TBL_ACCESS_LOG." WHERE memberId = :memberId ORDER BY lastAccess DESC";
        
        try{
            $st = $con->prepare($sql);
            $st->bindValue(":memberId", $memberId, PDO::PARAM_INT);
            $st->execute();
            
            $logEntries = array();
            foreach($st->fetchAll() AS $row){
                $logEntries[] = new LogEntry($row);
            }
            parent::disconnect($con);
            return $logEntries;
        } catch (Exception $ex) {
            parent::disconnect($con);
            die("Query failed: ".$ex->getMessage());
        }
          
   //fin getLogEntries     
    }
    
    /**
     * Metodo public 
     * insert obj record
     */
    public function record(){
       //comprobar devolucion
       $con = parent::connect();
      
       $sql = "SELECT * FROM ".TBL_ACCESS_LOG." WHERE  memberId = :memberid and pageUrl = :pageurl";
       
       try{
           $st = $con->prepare($sql);
           $st->bindValue(":memberid", $this->data["memberId"], PDO::PARAM_INT);
           $st->bindValue(":pageurl", $this->data["pageUrl"], PDO::PARAM_INT);
           $st->execute();
           
           if($st->fetch()){
               $sql = "UPDATE ".TBL_ACCESS_LOG." SET numVisits = numVisits + 1 WHERE memberId = :memberid AND pageUrl = :pageurl";
               $st = $con->prepare($sql);
               $st->bindValue(":memberid", $this->data["memberId"], PDO::PARAM_INT);
               $st->bindValue(":pageurl", $this->data["pageUrl"], PDO::PARAM_STR);
               $st->execute();
               
           } else {
               $sql = "INSERT INTO ".TBL_ACCESS_LOG." (memberId, pageUrl, numVisits) VALUES (:memberid, :pageurl, 1)";
               $st = $con->prepare($sql);
               $st->bindValue(":memberid", $this->data["memberId"], PDO::PARAM_INT);
               $st->bindValue(":pageurl", $this->data["pageUrl"], PDO::PARAM_STR);
               $st->execute();
           }
           parent::disconnect($con);
       } catch (Exception $ex) {
           parent::disconnect($con);
           echo 'El error se produce en la línea: '.$ex->getLine().'<br>';
           echo 'Del archivo: '.$ex->getFile();
           echo'<br>';
           echo $ex->getCode().'<br>';
           die("Query failed: ".$ex->getMessage());

       }
  //fin  record
   } 
   
    /**
     * Metodo publi static 
     * delete obj member from table TBL_ACCESS_LOG
     * @param type $memberId
     */
    public static function deleteAllForMember($memberId){
       
       $con = parent::connect();
       $sql = "DELETE FROM ".TBL_ACCESS_LOG. " WHERE memberid = :memberid";
       
       try{
           $st = $con->prepare($sql);
           $st->bindValue(":memberid", $memberId, PDO::PARAM_INT);
           $st->execute();
           parent::disconnect($con);
           
       } catch (Exception $ex) {
           parent::disconnect($con);
           die("Query failed: ".$ex->getMessage());
       }
       
       
       
       
   //fin deleteAllForMember    
   }
//fin LogEntry    
}
