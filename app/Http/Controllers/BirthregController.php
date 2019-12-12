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
        $stateoforigins = Stateoforigin::orderBy('name', 'asc')->get();
        
        $birthregisters = Childreg::orderBy('created_at','desc')->get();

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
            'stateoforigin_id' => 'required',
            
        ]);

        $childreg=new Childreg;
        $childreg->certnumber=$request->certnumber;
        $childreg->lastname=$request->lastname;
        $childreg->firstname=$request->firstname;
        $childreg->othername=$request->othername;
        $childreg->gender=$request->gender;
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
        $user = Auth::user();
        $stateoforigins = Stateoforigin::orderBy('name', 'asc')->get();
        
        $birthregs = Childreg::where('id',$id)->first();

        return view('admin.birthreg.edit', compact('user', 'birthregs', 'stateoforigins'));
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
            'dob' => 'required',
            'placeofbirth' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'stateoforigin_id' => 'required',
            
        ]);

        $childreg=Childreg::find($id);
        $childreg->certnumber=$request->certnumber;
        $childreg->lastname=$request->lastname;
        $childreg->firstname=$request->firstname;
        $childreg->othername=$request->othername;
        $childreg->gender=$request->gender;
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
