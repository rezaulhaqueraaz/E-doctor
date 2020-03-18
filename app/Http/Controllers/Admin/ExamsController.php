<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    public function store(Request $request){
        $name= $request->name;
        $examDsc= $request->examDsc;
        $exam=new Exam();
        $exam->name=$name;
        $exam->examDsc=$examDsc;
        $exam->save();
        if ($exam){
            return response()->json(['Success'=>$name.' Disease Add Successfully']);
        }else{
            return response()->json(['Error'=>$name.' Disease Not Add Successfully!, Try Again']);
        }
    }
    public function getData(){
        $exam= Exam::orderBy('id', 'desc')->get();
        return response()->json(['examGet'=>$exam]);
    }
    public function delete($id){
        $delete=Exam::where("id",$id)->delete();
        return response()->json(["delete"=>' Successfully Deleted']);

    }
}
