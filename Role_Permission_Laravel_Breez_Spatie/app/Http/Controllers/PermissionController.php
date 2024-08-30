<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //This method will show permissions page
    public function index(){

      Permission::all()
      return view('permissions.list');


    }

      //This method will show create permissions page
      public function create(){

        return view('permissions.create');

      }

        //This method will insert a permissions in DB
    public function store(Request $request){
      $validator =Validator::make($request->all(),[
        'name' => 'required|unique:permissions|min:3',
      ]);
      if($validator->passes()) {
      

        Permission::create(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('success', 'Permissions added successfully');

      }else{
        return redirect()->route('permissions.create')->withInput()->withErrors($validator);
      }

    }

      //This method will show edit permissions page
      public function edit(){

      }


        //This method will update a permissions 
        public function update(){

        }

        //This method will delete a permissions in DB 
        public function destroy(){

        }
}
