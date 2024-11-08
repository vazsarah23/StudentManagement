<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    //m
    public function dashboard(){

        
            $data['header_title'] = 'Dashboard';
            if(Auth::user()->user_type ==1){

                
                return view('admin.dashboard', $data);
            }
            else if(Auth::user()->user_type ==2){
                return view('teacher.dashboard', $data);
            }
            else if(Auth::user()->user_type ==3){
                return view('student.dashboard', $data);
            }
            else if(Auth::user()->user_type ==4){
                return view('parent.dashboard', $data);
            }
        
    }

    public function list(){

        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list',$data);
    }


}
