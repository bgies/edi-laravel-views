<?php

namespace Bgies\EdiLaravel\FileHandling;



class StoredProcedure 
{
   public $storedProcedureName;
   
   
   
   /**
    * Create a new instance.
    *
    * @return void
    */
   public function __construct()
   {
      \Log::info('class StoredProcedure construct');
      
      //parent::__construct();
      
      //\Log::info('class StoredProcedure construct after parent');
      
   }
   
   public function execute($dataset = null)
   {
      if (! $this->storedProcedureName) {
         //throw new \Exception("Stored Procedure Name is Blank");
         return false;
      }
      
      $procNameStr = "CALL " . $this->storedProcedureName;
      // if there are no params 
      if (!strpos($this->storedProcedureName, ':') > 0) {
          $dbResults = \DB::select(\DB::raw( $procNameStr . ';' ));
          return $dbResults;
      }

      // if there params
      $paramVals = [];
      $procNameStr = "CALL " . substr($this->storedProcedureName, 0, strpos($this->storedProcedureName, ':')) . ' (' ;
      $Str = substr(trim($this->storedProcedureName), strpos($this->storedProcedureName, ':')); 
      do {
          if (!strpos($Str, ' ')) {
              $paramName = substr($Str, 1);
              $Str = '';
              $procNameStr .= $dataset->$paramName;
              
          } else {
             $paramName = substr($Str, 1, strpos($Str, ' '));
             $Str = substr($Str, strpos($Str, ' ') + 1);
          }
          $paramVals[] = $dataset->$paramName;
//          $procNameStr .= '? ';
       } while (strlen($Str) > 0);
       
       $procNameStr .= ')';
       $dbResults = \DB::select(\DB::raw( $procNameStr ));
//      $dbResults = \DB::select(\DB::raw( $procNameStr ), $paramVals);
      
      return $dbResults;
   }
   
   
   
   
}

