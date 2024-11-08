<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;


class StudentController extends Controller
{
    //
    public function list(){

        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list',$data);
    }

    public function add(){
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add new Student';
        return view('admin.student.add',$data);
    }

    public function insert(Request $request){
        // dd($request->all());

        // request()->validate([
        //     'email'=> 'required|email|unique:users,email,'.$id,
        //     'mobile_number' => 'max:15',
        //     'admission_number' => 'max:15|unique:users',
        //     'rollno' => 'max:15','password' => 'required','min:8',
        //     'name' => 'required|string|max|20',
        //     'l_name' => 'required|string|max|20',
        //     'date_of_birth' => 'required|date|befor_or_equal:today',
        //     'qualification' => 'required|string|max|20',
        //     'sscpercentage' => 'required|numeric|between:0,100',
        //     'hsscpercentage' => 'required|numeric|between:0,100',
        //     'graduationpercentage' => 'required|numeric|between:0,100',

        // ]);
        
        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }


        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        

        if(!empty($request->admission_date)){
            $student->admission_date = trim($request->admission_date);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/profile',$filename);
            $student->profile_pic = $filename;
        }


        // $student->profile_pic = trim($request->profile_pic);
        $student->sscpercentage = trim($request->sscpercentage);
        if(!empty($request->file('sscmarksheet'))){
            $ext = $request->file('sscmarksheet')->getClientOriginalExtension();
            $file = $request->file('sscmarksheet');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/marksheet',$filename);
            $student->sscmarksheet = $filename;
        }

        $student->hsscpercentage = trim($request->hsscpercentage);

        if(!empty($request->file('hsscmarksheet'))){
            $ext = $request->file('hsscmarksheet')->getClientOriginalExtension();
            $file = $request->file('hsscmarksheet');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/marksheet',$filename);
            $student->hsscmarksheet = $filename;
        }
        $student->graduationpercentage = trim($request->graduationpercentage);
        if(!empty($request->file('graduationmarksheet'))){
            $ext = $request->file('graduationmarksheet')->getClientOriginalExtension();
            $file = $request->file('graduationmarksheet');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/marksheet',$filename);
            $student->graduationmarksheet = $filename;
        }
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = hash::make($request->password);
        $student->user_type=3;
        $student->save();

        return redirect('admin/student/list')->with('success','student successfully created');

    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){

            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = 'Edit  Student';
            return view('admin.student.edit',$data);
        }
        else{
            abort(404);
        }

    }

    public function update($id, Request $request){

        request()->validate([
            'email'=> 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15',
            'admission_number' => 'max:15|unique:users',
            'rollno' => 'max:15','password' => 'required','min:8',
            // 

        ]);

        $student =  User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }


        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        

        if(!empty($request->admission_date)){
            $student->admission_date = trim($request->admission_date);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/profile',$filename);
            $student->profile_pic = $filename;
        }


        // $student->profile_pic = trim($request->profile_pic);
        $student->sscpercentage = trim($request->sscpercentage);
        if(!empty($request->file('sscmarksheet'))){
            $ext = $request->file('sscmarksheet')->getClientOriginalExtension();
            $file = $request->file('sscmarksheet');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/marksheet',$filename);
            $student->sscmarksheet = $filename;
        }

        $student->hsscpercentage = trim($request->hsscpercentage);

        if(!empty($request->file('hsscmarksheet'))){
            $ext = $request->file('hsscmarksheet')->getClientOriginalExtension();
            $file = $request->file('hsscmarksheet');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/marksheet',$filename);
            $student->hsscmarksheet = $filename;
        }
        $student->graduationpercentage = trim($request->graduationpercentage);
        if(!empty($request->file('graduationmarksheet'))){
            $ext = $request->file('graduationmarksheet')->getClientOriginalExtension();
            $file = $request->file('graduationmarksheet');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename=strtolower($randomStr). '.' .$ext;
            $file->move('upload/marksheet',$filename);
            $student->graduationmarksheet = $filename;
        }
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password)){
            $student->password = hash::make($request->password);
        }
        
        $student->user_type=3;
        $student->save();

        return redirect('admin/student/list')->with('success','student successfully updated');

    }

    public function delete($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/student/list')->with('succees',"Admin successfully deleted");
    }
}
