<?php
namespace app\traits;
use Illuminate\Http\Request;
trait upload {
public function uploadimage(request $request,$foldername){
    $foldername=$request->foldername;
    $image=$request->file("image")->getclientOriginalName();
    $path=$request->file("image")->storeAs($foldername,$image,"users");
    return $path;
}
}
