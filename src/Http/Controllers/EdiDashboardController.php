<?php

namespace Bgies\EdiLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Bgies\EdiLaravel\Models\EdiFiles;
use Bgies\EdiLaravel\Models\EdiTypes;
use Bgies\EdiLaravel\Exceptions\NoSuchEdiTypeException;
use Bgies\EdiLaravel\Functions\ObjectFunctions; 
use Bgies\EdiLaravel\Functions\UpdateFunctions;


class EdiDashboardController extends Controller 
{
   public $navPage = "dashboard";
   
   public function dashboard()
   {

      $ediFiles = EdiFiles::paginate();
//      \Log::info('ediManageController index ediFiles: ' . print_r($ediFiles, true));
      $ediTypes = EdiTypes::all();

      return view('edilaravel::dashboard.dashboard')
         ->with('ediFiles', $ediFiles)
         ->with('ediTypes', $ediTypes)
         ->with('navPage', $this->navPage);      
   }
   
   
   public function phpinfo()
   {
      return view('edilaravel::manage.phpinfo')
         ->with('navPage', $this->navPage);
//      \Log::info('ediManageController index ediFiles: ' . print_r($ediFiles, true));
//      phpinfo();
      
   }
   
   
   
   
   
   
   
   
}