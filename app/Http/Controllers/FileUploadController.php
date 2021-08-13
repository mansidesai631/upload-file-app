<?php

namespace App\Http\Controllers;

Use App\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file');
    }

    public function upload(Request $request)
    {
        //handle uploads
        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = storage_path() .'/app/public/uploads/'. auth()->id() . '/' . $fileName;

            if (!file_exists($path)) {
                $filePath = $file->storeAs('/public/uploads/'. auth()->id(), $fileName);
                Storage::MakeDirectory($filePath);

                $uploadFile = new UploadFile;
                $uploadFile->filename = $fileName;
                $uploadFile->code = Str::random(7);
                $uploadFile->download_count = 0;

                $uploadFile->user()->associate(auth()->user());

                $uploadFile->save();
            } else {
                return back()
                    ->with('success','File already exists');
            }
        }

        return back()
            ->with('success','Great! file has been successfully uploaded.')
            ->with('file', $uploadFile);
    }

    public function getAllFiles(Request $request)
    {
        $filesArray = UploadFile::where('user_id', auth()->id())->get();
        if (count($filesArray) == 0) {
            return response()->json(['Message' => 'No File Available']);
        }
        $files = array();
        foreach ($filesArray as $file) {
            $filename  = basename($file->filename);
            $code   =$file->code;
            $array = array(
                "filename" => $filename,
                "code"      => $code,
            );
            array_push($files, $array);
        }

        return view('viewAllFile')
            ->with('files', $files);
    }

    public function downloadFile(UploadFile $code)
    {

        $file_path = storage_path() .'/app/public/uploads/'. $code->user_id . '/' . $code->filename;
        if (file_exists($file_path))
        {
            // Send Download
            return response()->download($file_path, $code->filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        } else {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }

    public function deleteFile(UploadFile $code)
    {
        $file_path = storage_path() .'/app/public/uploads/' . auth()->id() . '/' . $code->filename;
        if(file_exists($file_path)){
            @unlink($file_path);
            $code->delete();
            return back();
        } else{
            // Error
            exit('Requested file does not exist on our server!');
        }
    }

    public function fileInfo(UploadFile $code)
    {
        $file_path = storage_path() .'/app/public/uploads/' . auth()->id() . '/' . $code->filename;
        if(file_exists($file_path)){
            return view('viewInfo')
                ->with('file', $code);
        } else{
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
}
