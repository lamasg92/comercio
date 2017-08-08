<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    protected function index(){

    	//return view('admin.users.create');
    }

   protected function create(){

    $roles=Role::orderBy('name','ASC')->pluck('name','id')->ToArray();

   	return view('admin.users.create')->with('roles',$roles);
   }

   protected function store(UserRequest $request){

   
    
    $user=new User($request->all());
    $user->fill($request->all());
    $user->password=bcrypt($request->password);

     if($request->file('photo')){
                 $file =$request->file('photo');
                 $extension=$file->getClientOriginalName();
                 $path=public_path().'/images/users/';
                 $file->move($path,$extension);
                $users->name_photo=$extension;
                }

    $user->save();

      

   }

   public function edit($id){

   }


   public function update(UserRequest $request,$id){
    


   }

   public function editPassword(){

    return view('admin.users.changePassword');
   }

   public function show(){

    return view('admin.users.changePassword');
   }


   public function changePassword(ChangePasswordRequest $request){

    $user=\Auth::user();

     $user->password=bcrypt($request->newpassword);
     $user->save();

   }




}