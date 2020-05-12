<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            // 取得圖片檔名以及副檔名
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            // 取得原本圖片檔名（去除掉副檔名）
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            // 取得副檔名 並用 strtolower 統一小寫。
            $extension = strtolower($request->file('upload')->getClientOriginalExtension());
            // 不同的副檔名，對應的 create 也不同。
            switch ($extension) {
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

            // 欲儲存的檔名 => 原圖片檔名 + 時間戳記 + 副檔名 [ time()回傳的是 unix時間格式 ]
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $save_path = public_path('images/uploads/');
            switch ($extension) {
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
            $msg = '圖片上傳成功！';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
