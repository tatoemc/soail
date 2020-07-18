<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degree;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $degrees = Degree::orderBy('id', 'desc')->paginate(8);
        //return view and pass in the variable
        return view ('degrees.index')->withDegrees($degrees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('degrees.create');
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
        $this->validate($request , array(
         'name'=> 'required'
     
        ));
        //2 
        $degree = new Degree; 
        $degree->name = $request->name;
        
        $degree->save();

        return redirect()->route('degrees.show', $degree->id);
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
        $degree = Degree::find($id);  
        return view('degrees.show')->withDegree($degree);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $degree = Degree::find($id);
        return view('degrees.edit')->withDegree($degree);
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
         $this->validate($request , array(
         'name'=> 'required'
        
         
        ));
        //save the data to the data base
        $degree = Degree::find($id);
        $degree->name = $request->input('name');

        $degree->save();

        //redirect with flash data to  posts.show
        return redirect()->route('degrees.show', $id); 
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
        $degree = degree::find($id);
        $degree->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('degrees.index'); 
    }
}
