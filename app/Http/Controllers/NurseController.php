<?php

namespace App\Http\Controllers;

use App\Stateoforigin;
use App\User;
use Illuminate\Http\Request;

use Auth;


class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $nurses = User::where('role_id', '2')->orderBy('created_at','desc')->get();
        $stateoforigins = Stateoforigin::orderBy('name', 'asc')->get();


        return view('admin.nurse.index', compact('user', 'nurses', 'stateoforigins'));
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
        $this->validate($request, [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->othername = $request->othername;
        
        $user->email = $request->email;
        $user->phone = $request->phone;
       
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        

        $user->save();

        return redirect(route('nurse.index'))->with('success', 'New Nurse has been added successfully!');
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
        $user = Auth::user();
        $nurses = User::where('id', $id)->first();
        $stateoforigins = Stateoforigin::orderBy('name', 'asc')->get();


        return view('admin.nurse.edit', compact('user', 'nurses', 'stateoforigins'));
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
        $this->validate($request, [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find($id);
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->othername = $request->othername;
        
        $user->email = $request->email;
        $user->phone = $request->phone;
       
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        

        $user->save();

        return redirect(route('nurse.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nurses=User::where('id',$id)->delete();
        return back();
    }
}
