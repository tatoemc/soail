<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $jobs = Job::orderBy('id', 'desc')->paginate(8);
        //return view and pass in the variable
        return view ('jobs.index')->withJobs($jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.create');
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
         'name'=> 'required',
         'description'=> 'required'
     
        ));
        //2 
        $job = new Job; 
        $job->name = $request->name;
        $job->description = $request->description;
        
        $job->save();

        return redirect()->route('jobs.show', $job->id);
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
        $job = Job::find($id);  
        return view('jobs.show')->withJob($job);
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
         $job = Job::find($id);
        return view('jobs.edit')->withJob($job);
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
         'name'=> 'required',
         'description'=> 'required'
        
         
        ));
        //save the data to the data base
        $job = Job::find($id);
        $job->name = $request->input('name');
        $job->description = $request->input('description');

        $job->save();

        //redirect with flash data to  posts.show
        return redirect()->route('jobs.show', $id); 
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
        $job = Job::find($id);
        $job->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('jobs.index'); 
    }
}
