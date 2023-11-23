<?php

namespace App\Http\Controllers;

use App\traits\upload;
use Illuminate\Http\Request;

class imagecontroller extends Controller
{
    use upload;
    public function showimage(){
        return view ("image");
    }
    public function storeimage(request $request){
return $this->uploadimage($request,"admins");
    }
}
