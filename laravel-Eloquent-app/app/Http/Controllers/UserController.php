<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $user = User::with('contact')->find(2);

    // $user = User::with('contact')->where('city', 'Indore')->get();

    // $user = User::withWhereHas('contact',function($query){
    //     $query ->where('city', 'Indore');
    // })->get();

    // $user = User::where('gender','female')->withWhereHas('contact',function($query){
    //     $query ->where('city', 'patna');
    // })->get();

    $user = User::where('gender','female')->WhereHas('contact',function($query){
        $query ->where('city', 'patna');
    })->get();

       return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =User::create([
            'name' => 'rahul',
            'email' => 'rahul@gmail.com',
            'password' =>'12345',
            'gender'=>'male'
        ]);

        $user->contact()->create([
            'email'=>'rahul@gmial.com',
            'phone'=>'9771010903',
            'address' =>'sanvid nagar',
            'city' =>'indore',
            // 'user_id'=>'4'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
