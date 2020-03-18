<?php

namespace App\Http\Controllers\Admin;

use App\Disease;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function store(Request $request){
        $name= $request->name;
        $diseaseDsc= $request->Disease;
        $disease=new Disease();
        $disease->name=$name;
        $disease->diseaseDsc=$diseaseDsc;
        $disease->save();
        if ($disease){
            return response()->json(['Success'=>$name.' Disease Add Successfully']);
        }else{
            return response()->json(['Error'=>$name.' Disease Not Add Successfully!, Try Again']);
        }
    }
    public function getData(){
        $disease= Disease::orderBy('id', 'desc')->get();
        return response()->json(['diseaseGet'=>$disease]);
    }
    public function delete($id){
        $delete=Disease::where("id",$id)->delete();
        return response()->json(["delete"=>' Successfully Deleted']);

    }
}
