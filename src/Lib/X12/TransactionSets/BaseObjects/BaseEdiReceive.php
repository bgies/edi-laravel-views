<?php

namespace Bgies\EdiLavavel\Lib\X12\TransactionSets\BaseObjects;

use Illuminate\Database\Eloquent\Collection;
use Bgies\EdiLavavel\Lib\X12\TransactionSets\BaseEDIObject;



abstract class BaseEdiReceive extends BaseEDIObject 
{
   

//   abstract protected function getFile() ;
   
   
//   abstract protected function readFile($dataResults);
   
   abstract protected function dealWithFile();
   
   protected function getEDIType(int $ediTypeId) { 
      
      
   }
   
  
   
   
   
   
   
   
}
   