<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    //
    public function list(){

        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin List';
        return view('admin.admin.list',$data);
    }

    public function add(){

        
        $data['header_title'] = 'Add Admin ';
        return view('admin.admin.add',$data);
    }
    public function insert(Request $request){
        // dd($request->all());
        request()->validate([
            'email'=> 'required|email|unique:users',
            // 'password' => 'required','min:8',
            // 'name' => 'required|string|max|20',
        ]);


        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('succees',"Admin successfully created");
    }

    public function edit($id){

        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){

            $data['header_title'] = 'Edit Admin ';
            return view('admin.admin.edit',$data);
        }
        else {
            abort(404);
        }
    }

    public function update($id,Request $request){

        request()->validate([
            'email'=> 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        
        // $user->user_type = 1;
        $user->save();//

        return redirect('admin/admin/list')->with('succees',"Admin successfully updated");
    }

    public function delete($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/admin/list')->with('succees',"Admin successfully deleted");
    }


}
