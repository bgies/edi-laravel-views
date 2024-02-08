<?php

namespace Bgies\EdiLaravel\Lib\X12\TransactionSets\BaseObjects;

use Bgies\EdiLaravel\Lib\X12\TransactionSets\BaseObjects\BaseEdiObject as BaseEdiObject;
use Bgies\EdiLaravel\Lib\X12\Options\BaseEdiOptions;
use Bgies\EdiLaravel\Lib\X12\Options\Send\EdiSendOptions;
use Illuminate\Database\Eloquent\Collection;


/*
use ArrayAccess;
use Exception;
use Illuminate\Contracts\Queue\QueueableCollection;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\ConnectionResolverInterface as Resolver;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\ForwardsCalls;
use JsonSerializable;
*/


abstract class BaseEdiSend extends BaseEdiObject 
{
   
/*
   use Concerns\HasAttributes,
   Concerns\HasEvents,
   Concerns\HasGlobalScopes,
   Concerns\HasRelationships,
   Concerns\HasTimestamps,
   Concerns\HidesAttributes,
   Concerns\GuardsAttributes,
   ForwardsCalls;
*/   
 /*  
   public function __construct()
   {
      //parent::__construct();
      
      
   }
 */  
   abstract protected function getData() ;
   
   
   abstract protected function composeFile($dataResults, string $tableName);
   
   abstract protected function dealWithFile(string $FileShortName, EDISendOptions $EDIObj);
   
   protected function getEDIType(int $ediTypeId) {
      
           
      
   }
   
   abstract protected function checkForRequiredFields();
   
   
}