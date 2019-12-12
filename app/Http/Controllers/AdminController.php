<?php

namespace App\Http\Controllers;

use App\Childreg;
use App\Stateoforigin;
use App\User;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $admins=User::where('role_id',1)->get()->count();
        $nurseCount = User::where('role_id', '2')->count();
        $adminCount = User::where('role_id', '1')->count();
        $birthregs=Childreg::count();
               
        return view('admin.index',compact('user','admins','nurseCount','adminCount','birthregs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function admins()
    {
        $user = Auth::user();
        $admins = User::where('role_id', '1')->orderBy('created_at', 'desc')->get();
        $nurseCount = User::where('role_id', '2')->count();
        $adminCount = User::where('role_id', '1')->count();
        $stateoforigins = Stateoforigin::orderBy('name', 'asc')->get();

        return view('admin.admins.index', compact('user', 'admins', 'stateoforigins','nurseCount','adminCount'));
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
