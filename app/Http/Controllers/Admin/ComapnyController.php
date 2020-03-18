<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComapnyController extends Controller
{
    public function store(Request $request){
       $name= $request->name;
       $desc= $request->CompanyDesc;
       $company=new Company();
       $company->CompanyName=$name;
       $company->CompanyDesc=$desc;
       $company->save();
       if ($company){
           return response()->json(['Success'=>$name.' Company Add Successfully']);
       }else{
           return response()->json(['Error'=>$name.' Company Not Add Successfully!, Try Again']);
       }

    }
    public function getData(){
       $company= Company::orderBy('id', 'desc')->get();
        return response()->json(['dataCompany'=>$company]);
    }
    public function delete($id){
        $delete=Company::where("id",$id)->delete();
        return response()->json(["delete"=>' Successfully Deleted']);

    }
}
