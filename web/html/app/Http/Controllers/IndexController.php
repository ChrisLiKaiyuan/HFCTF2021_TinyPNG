<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function fileUpload(Request $req)
    {
        $allowed_extension = "png";
        $extension = $req->file('file')->clientExtension();
        if($extension === $allowed_extension && $req->file('file')->getSize() < 204800)
        {
            $content = $req->file('file')->get();
            if (preg_match("/<\?|php|HALT\_COMPILER/i", $content )){
                $error = 'Don\'t do that, please';
                return back()
                    ->withErrors($error);
            }else {
                $fileName = \md5(time()) . '.png';
                $path = $req->file('file')->storePubliclyAs('uploads', $fileName);
                echo "path: $path";
                return back()
                    ->with('success', 'File has been uploaded.')
                    ->with('file', $path);
            }
        } else{
            $error = 'Don\'t do that, please';
            return back()
                ->withErrors($error);
        }


    }
}
