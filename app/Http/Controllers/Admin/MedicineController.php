<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{

    public function store(Request $request){
        $name= $request->name;
        $generic= $request->genericName;
        $companyname= $request->company;
        $mdsc= $request->medicineDsc;
        $medicine=new Medicine();
        $medicine->MedicineName=$name;
        $medicine->GenericName=$generic;
        $medicine->company_id=$companyname;
        $medicine->MedicineDsc=$mdsc;
        $medicine->save();
        if ($medicine){
            return response()->json(['Success'=>$name.' Medicine Add Successfully']);
        }else{
            return response()->json(['Error'=>$name.' Company Not Add Successfully!, Try Again']);
        }

    }
    public function getmedicine(){
        $medicine= Medicine::orderBy('id', 'desc')->get();
        return response()->json(['medicineGet'=>$medicine]);
    }
    public function delete($id){
        $delete=Medicine::where("id",$id)->delete();
        return response()->json(["delete"=>' Successfully Deleted']);

    }
}
