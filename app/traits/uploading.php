<?php 
namespace app\traits;
use illuminate\Http\Request;
trait uploading{
    public function uploading(request $request){
        $foldername=$request->foldername;
        $image=$request->file("image")->getclientOriginalName();
        $path=$request->file("image")->storeAs($foldername,$image,"users");
        return $path;
    }
}

?>