<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handle(Request $request)
    {
        $source = $request->input('image');
        if(empty($source)){
            return view('image');
        }
        $temp = explode(".", $source);
        $extension = end($temp);
        if ($extension !== 'png') {
            $error = 'Don\'t do that, pvlease';
            return back()
                ->withErrors($error);
        } else {
            $image_name = md5(time()) . '.png';
            $dst_img = '/var/www/html/' . $image_name;
            $percent = 1;
            (new imgcompress($source, $percent))->compressImg($dst_img);
            return back()->with('image_name', $image_name);
        }
    }
}
