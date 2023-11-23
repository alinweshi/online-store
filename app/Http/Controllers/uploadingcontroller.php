<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\traits\uploading;
use Illuminate\Http\Request;

class uploadingcontroller extends Controller
{
    use uploading;
    public function enterdata(){
        return view('uploading');
    }
    public function storedata(request $request){
return $this->uploading($request);
                }
                public function create(){
                    $images=image::create([
                        
                    ]);
                }
}
