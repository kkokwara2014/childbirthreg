<?php

namespace App\Http\Controllers;

use App\Childreg;
use App\Stateoforigin;
use Illuminate\Http\Request;
use Auth;

class BirthregController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $birthregisters = Childreg::orderBy('created_at','desc')->get();
        $stateoforigins = Stateoforigin::orderBy('name', 'asc')->get();


        return view('admin.birthreg.index', compact('user', 'birthregisters', 'stateoforigins'));
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
            'dob' => 'required',
            'placeofbirth' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'stateoforigin' => 'required',
            
        ]);

        $childreg=new Childreg;
        $childreg->certnumber=$request->certnumber;
        $childreg->lastname=$request->lastname;
        $childreg->firstname=$request->firstname;
        $childreg->othername=$request->othername;
        $childreg->dob=$request->dob;
        $childreg->placeofbirth=$request->placeofbirth;
        $childreg->fathername=$request->fathername;
        $childreg->mothername=$request->mothername;
        $childreg->user_id=$request->user_id;
        $childreg->stateoforigin_id=$request->stateoforigin_id;
        
        $childreg->save();

        return redirect(route('birthreg.index'));
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
        $birthregs = Childreg::where('id', $id)->delete();
        return redirect()->back();
    }
}
