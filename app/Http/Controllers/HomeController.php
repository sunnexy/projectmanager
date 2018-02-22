<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Validator;
use Input;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct(){
        return $this->middleware('Auth');
    }*/
    public function index()
    {
        return view('welcome');
    }
    public function profile()
    {
        return view('profile');
    }
    public function store(Request $request){
        if($request->id != Auth()->user()->id){
            return redirect()->route('login')
                ->with('errors', 'Login to do this');;
        }
        $file = $request->file('image');
        $theImages = "";
        //declare validation rules
        $rules = array(
            'file'=> 'required|mimes:png,gif,jpeg'
        );
        $validator = Validator::make(array('file' => $file), $rules);
        if($validator->passes()){
            $destinationPath = 'uploads/' . microtime(true);
            $filename = $file->getClientOriginalName();
            $theImages = $destinationPath. '/' . $filename;
            $upload_success = $file->move($destinationPath, $filename);
        }else{
            session()->flash('danger', 'Validation failed');
            return redirect()->back();
        }
        //update to db
        $user = new User();
        $user->where('id', $request->id)->update(['image'=>$theImages]);

        session()->flash('success', 'Image uploaded successfully');
        return redirect()->back();
    }
    public function update(){
        $user = Auth::user();
        $user->name = Request::input('name');
        $user->password = Request::input('password');
        $user->save();
        session()->flash('success', 'Updated Successfully');
        return redirect('/profile');
    }
}
