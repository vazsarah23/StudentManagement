<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;

class TeacherController extends Controller
{
    //
    public function list(){

        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = 'Teacher List';
        return view('admin.teacher.list',$data);
    }
    public function add(){
        // $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add new Teacher';
        return view('admin.teacher.add',$data);
    }

    public function insert(Request $request){
        // dd($request->all());
        
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            // 'password' => 'required','min:8',
            // 'name' => 'required|string|max|20',
            // 'l_name' => 'required|string|max|20',
            // 'date_of_birth' => 'required|date|befor_or_equal:today',
            // 'qualification' => 'required|string|max|20',

        ]);

        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);

        if(!empty($request->admission_date)){
            $teacher->admission_date = trim($request->admission_date);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/profile',$filename);
            $teacher->profile_pic = $filename;
        }

        $teacher->qualification = trim($request->qualification);
        $teacher->workexperience = trim($request->workexperience);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();
        


        return redirect('admin/teacher/list')->with('success','Teacher successfully created');

    }
    public function delete($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/teacher/list')->with('succees',"Teacher successfully deleted");
    }


}
