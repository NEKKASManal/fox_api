<?php
namespace App\Fox;


Class Foxclass{

    // db_url=self::db_url;
    public static  function  fquery($query,array $fields){

      $db_url=self::db_url;
      $conn = new \COM("ADODB.Connection");
      try {
        $conn->Open("Provider=VFPOLEDB.1;Data Source='$db_url';"); 
      } 
      catch (\Throwable $th) {
       return 'database not found or link is incorrect '.$th;
      }          
      $rs = $conn->Execute($query) or die("Error in query: $query. " . $conn->ErrorMsg());
      $rooms =[];
      $room =[];
      
      while (!$rs->EOF) {
        for ($i=0; $i <count($fields) ; $i++) { 
          $room[$fields[$i]]=strval(trim($rs[$fields[$i]])) ; 
        }
        $row = array_map('utf8_encode', $room);
        array_push($rooms,$row);
        $room=[];
        $rs->MoveNext();
      }
   
      $conn->Close();
      return ($rooms);
    }

      
    public static  function  obj($query)
    {
      $db_url=self::db_url;
      $conn = new \COM("ADODB.Connection");
      $conn->Open("Provider=VFPOLEDB.1;Data Source='$db_url';"); 
                
      $rs = $conn->Execute($query) or die("Error in query: $query. " . $conn->ErrorMsg());
      return $rs;
    }

    public static  function  update($query)
    {
      $db_url=self::db_url;
      $conn = new \COM("ADODB.Connection");
      $conn->Open("Provider=VFPOLEDB.1;Data Source='$db_url';"); 
                
      $conn->Execute($query) or die("Error in query: $query. " . $conn->ErrorMsg());
      // $conn->Close();
      return 'Update done';
    }
}