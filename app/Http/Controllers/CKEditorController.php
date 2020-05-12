<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request){
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = strtolower($request->file('upload')->getClientOriginalExtension());
            switch($extension){
                case 'jpg':
                    $origin_picture = imagecreatefromjpeg($request->file('upload'));
                    break;
                case 'png':
                    $origin_picture = imagecreatefrompng($request->file('upload'));
                    break;
                case 'bmp':
                    $origin_picture = imagecreatefrombmp($request->file('upload'));
                    break;
                default:
                    $origin_picture = imagecreatefromjpeg($request->file('upload'));
                    break;
            }
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $save_path = public_path('images/uploads/');
            switch($extension){
                case 'jpg':
                    imagejpeg($origin_picture, $save_path . $filenametostore);
                    break;
                case 'png':
                    $background = imagecolorallocate($origin_picture, 0, 0, 0);
                    imagecolortransparent($origin_picture, $background);
                    imagealphablending($origin_picture, false);
                    imagesavealpha($origin_picture, true);
                    imagepng($origin_picture, $save_path . $filenametostore);
                    break;
                case 'bmp':
                    imagebmp($origin_picture, $save_path . $filenametostore);
                    break;
                default:
                    imagejpeg($origin_picture, $save_path . $filenametostore);
                    break;
            }
            $url = asset('images/uploads/' . $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }
}
