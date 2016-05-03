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
    
    
    
//fin LogEntry    
}
