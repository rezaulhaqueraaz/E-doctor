<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function maidicene(){
        return view('admin.data_entry.madicine');
    }
    public function exams(){
        return view('admin.data_entry.exams');
    }
    public function diseases(){
        return view('admin.data_entry.diseases');
    }
    public function company(){
        return view('admin.data_entry.company');
    }
    public function prescription(){
        return view('admin.prescription.index');
    }
}
