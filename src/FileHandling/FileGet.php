<?php

namespace Bgies\EdiLaravel\FileHandling;



class FileGet 
{
    public $fileDirectory = '';
    public $fileDriver = '';
    public $fileName = '';
//   public $filePath = '';
   
   
   /**
    * Create a new instance.
    *
    * @return void
    */
   public function __construct()
   {
      \Log::info('class FileGet construct');
      

      
   }
   
   public function execute() {
       $files = \Storage::disk(env('EDI_DiePraxisReadPRICAT_FileDriver'), 'local')->files(env('EDI_DiePraxisReadPRICAT_Get_Directory'));

/*       
       if ($files[0] == 'edi_files\incoming\HOERHAGER_PRICAT_Test_Gender_Age.edi') {
          $files = array();
          $files[] = 'HOERHAGER_PRICAT_Test_Gender_Age.edi';
       }
*/       
       
//      $fileContent = '';
//      if (count($files) > 0) {
//          $fileContent = \Storage::disk(env('EDI_DiePraxisReadPRICAT_FileDriver'), 'local')->get($files[0]);
//      }

      return $files;
   }
   
   
   
   
}

/*

unit FileDrop;

interface

uses
Windows, Messages, SysUtils, Classes, Controls;

type

TSetEDITransmissionDateTime = procedure(FileName, EDIType : string;
UpdateOpsDatabase : boolean);


TFileDrop = class(TComponent)
private
{ Private declarations }
FMoveFileList : TStringList;
FDeleteFilesAfterMove : boolean;
FOriginalFileDirectory : string;
FMoveFilesToDirectory : string;

FUpdateOpsDatabase : boolean;
protected
{ Protected declarations }
public
{ Public declarations }
FSetEDITransmissionDateTime : TSetEDITransmissionDateTime;
constructor Create(AOwner: TComponent); override;
destructor Destroy; override;
function MoveFiles : boolean;

published
{ Published declarations }
property MoveFileList : TStringList read FMoveFileList Write FMoveFileList;
property DeleteFilesAfterMove : boolean read FDeleteFilesAfterMove Write FDeleteFilesAfterMove;
property OriginalFileDirectory : String read FOriginalFileDirectory Write FOriginalFileDirectory;
property MoveFilesToDirectory : String read FMoveFilesToDirectory Write FMoveFilesToDirectory;

end;

procedure Register;

implementation



procedure Register;
begin
RegisterComponents('NLM', [TFileDrop]);
end;

{ TFileDrop }
constructor TFileDrop.Create(AOwner: TComponent);
begin
inherited;
FMoveFileList := TStringList.Create;
end;

destructor TFileDrop.Destroy;
begin
FMoveFileList.Clear;
FMoveFileList.Free;
inherited;
end;

//==============================================================================
Function TFileDrop.MoveFiles : boolean;
var
I : integer;
begin
if Not (DirectoryExists(FMoveFilesToDirectory)) then
begin
Result := false;
Exception.Create('The Move Files to Directory does not exist');
end;

For I := 0 to FMoveFileList.Count - 1 do
   begin
   if Length(FMoveFileList[I]) > 0 then
   begin
   if CopyFile(pChar(FMoveFileList[I]), pChar(FMoveFilesToDirectory + '\' + ExtractFileName(FMoveFileList[I])), true) then
            begin
              Result := true;
            end
          else
            begin
              Result := false;
              Exception.Create('Unable to copy file ' + FMoveFileList[I] + ' to ' + FMoveFilesToDirectory + ' directory');
            end;
      
          if FDeleteFilesAfterMove then
            DeleteFile(FMoveFileList[I]);
        end
      else
        begin
          Exception.Create('FileName is blank at position ' + IntToStr(I));
        end;
      
      
    end;
      
end;
      
initialization
  Classes.RegisterClass(TFileDrop);
      
      
end.

*/




