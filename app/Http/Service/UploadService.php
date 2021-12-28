<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Session;

class UploadService{

    public function store($request){
        try {
            if($request->hasFile('file')){
                $name = $request->file('file')->getClientOriginalName();
                $pathfull = 'uploads/'. date('Y-m-d');
                $path = $request->file('file')->storeAs(
                    'public/'.$pathfull, $name
                );
                // dd($path);
                return '/storage/'.$pathfull.'/'.$name;
            }
        } catch (\Exception $ex) {
            return false;
        }
        
    }
}