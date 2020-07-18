<?php

namespace App\Http\Controllers;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;

use Session;
use Hash;
use Image;
use Storage; 
use Auth; 
use App\Degree;
use App\Dept;
use App\Job;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id', 'desc'); 
        dd($users);
        //return view and pass in the variable
        return view ('users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!Gate::allows('isAdmin') )
            {
            abort(404,"Soory,you cant do this action");
            }

        $depts = Dept::all();
        $degrees = Degree::all();
        $jobs = Job::all(); 
         return view('users.create')->withDepts($depts)->withDegrees($degrees)->withJobs($jobs);
    }
    public function createEmp()
    {
        //
        if(!Gate::allows('isUser') )
            {
            abort(404,"Soory,you cant do this action");
            }

        $depts = Dept::all();
        $degrees = Degree::all();
        $jobs = Job::all(); 
         return view('users.createEmp')->withDepts($depts)->withDegrees($degrees)->withJobs($jobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , array(
         'name'=> 'required',
         'user_type' =>'required',
         'email' =>'required',
         'password' =>'required',
         'gender' =>'required',
         'state'=> 'required',
         'city' => 'required',
         'unit' => 'required',
         'home_no' => 'required',
         'Bdate'=> 'required',
         'qualification' => 'required',
         'snb' => 'required',
         'snb_type'=> 'required',
         'phone' => 'required',
         'phone2' => 'required',
         'images' =>'sometimes|image',
         'dept_id'=> 'required',
         'job_id' => 'required',
         'degree_id' =>'required'
       
        ));
        //2 
        $user = new User; 
        $user->name = $request->name;
        $user->user_type = $request->user_type;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->unit = $request->unit;
        $user->home_no = $request->home_no;
        $user->Bdate = $request->Bdate;       
        $user->qualification = $request->qualification;
        $user->snb = $request->snb;
        $user->snb_type = $request->snb_type;
        $user->phone = $request->phone;
        $user->phone2 = $request->phone2;
        $user->filename = $request->filename;
        $user->dept_id = $request->dept_id;
        $user->job_id = $request->job_id;
        $user->degree_id = $request->degree_id;
       
 
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);

            $user->images = $filename;
        } 
        $user->save();


       // Session::flash('success','تم الحفظ بنجاح');

        return redirect()->route('users.show', $user->id)->with('message','تم التعديلالأضافة بنجاح');
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //new statment
        $user = User::where('id',$id)->firstOrFail();   
        return view('users.show')->withUser($user);
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
        $user = User::find($id);
        $depts = Dept::all();
        $degrees = Degree::all();
        $jobs = Job::all();
        // Session::flash('message','تم التعديل بنجاح');
        return view('users.edit')->withUser($user)->withDepts($depts)->withDegrees($degrees)->withJobs($jobs);

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
         'user_type' =>'required',
         'email' =>'required',
         'gender' =>'required',
         'state'=> 'required',
         'city' => 'required',
         'unit' => 'required',
         'home_no' => 'required',
         'Bdate'=> 'required',
         'qualification' => 'required',
         'snb' => 'required',
         'snb_type'=> 'required',
         'phone' => 'required',
         'phone2' => 'required',
         'images' =>'sometimes|image',
         'dept_id'=> 'required',
         'job_id' => 'required',
         'degree_id' =>'required'
         
        ));
        //save the data to the data base
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->user_type = $request->input('user_type');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->unit = $request->input('unit');
        $user->home_no = $request->input('home_no');
        $user->Bdate = $request->input('Bdate');
        $user->qualification = $request->input('qualification');
        $user->snb = $request->input('snb');
        $user->snb_type = $request->input('snb_type');
        $user->phone = $request->input('phone');
        $user->phone2 = $request->input('phone');
        $user->dept_id = $request->input('dept_id');
        $user->job_id = $request->input('job_id');
        $user->degree_id = $request->input('degree_id');
        
 
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);
            $oldFilename = $user->image;
            $user->images = $filename;
           // Stroage::delete();
            Storage::delete($oldFilename);
        }

        $user->save();

        //redirect with flash data to  posts.show
        return redirect()->route('users.show', $id)->with('message','تم التعديل بنجاح'); 
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
        $user = User::find($id);
        Storage::delete($user->images);
        $user->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('users.index')->with('message','تم الحذف الموظف'); 
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","كلمة المرور الحالية غير صحيحة. فضلا حاول مجددا.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","لا يمكن تغير كلمة المرور بكلمة المرور الحالية. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","تم تغير كلمة المرور بنجاح !");
 
    }
    public function user1()
    {  
       
           $users = User::where('user_type', 'user')->get();
            return view ('users.user')->withUsers($users);
        
    }
    public function emp()
    {  
       
           $users = User::where('user_type', 'emp')->get();
            return view ('users.emp')->withUsers($users);
        
    }
    public function trainee()
    {  
       
           $users = User::where('user_type', 'trainee')->get();
            return view ('users.trainee')->withUsers($users);
        
    }
    
}
