<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\User;
use Redirect;
use Session;
use DB;

class UserController extends Controller
{
    public $module = "users";
    public $modulePath = "users";
    public $filePath = "media/users/";
    public $tableName = "users";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Index(){
        $data = array();
        $data['title'] = "Manage Users";
        $data['section'] = $this->module;
        $data['file_path'] = $this->filePath;
        $data['users'] = user::where('status','!=','delete')->get();
        return view($this->modulePath.'/index', $data);
    }

    public function Create(){
        $data = array();
        $data['title'] = 'Create User';
        $data['section'] = $this->module;
        return view($this->modulePath.'/create', $data);
    }

    public function Store(Request $request){

       $this->validate($request,[
            "name"  => "required",
            "email" => "required|email:rfc,dns|unique:users",
            "user_image" => "Mimes:jpg,jpeg,png,JPEG",
            "password" => "required|min:6",
            "confirm_password" => "required|same:password",
            "user_type" => "required|in:admin,support",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $data['type'] = $request->user_type;

        $image = $request->file('user_image');
        if($image){
            $image_name = time();
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(300, 300);
            $image_fullname = $image_name.'.'.$ext;
            $path = public_path($this->filePath);
            $image_path = $path.$image_fullname; 

            $success = $img->save($image_path);
            if($success){
                $data['photo'] = $image_fullname;
            }
        }

        $save = User::create($data);
        if($save){
            Session::flash("success_msg","Successfully Saved");
            return Redirect::to("users");
        }else{
            Session::flash("error_msg","Failed to Saved");
            return Redirect::to("users/create");
        }
        
    }

    public function Edit($id){
        $data = array();
        $data['title'] = 'Edit User';
        $data['section'] = $this->module;
        $data['user'] = user::findOrFail($id);
        return view($this->modulePath.'/edit', $data);
    }

    public function Update(Request $request){

       $id = $request->user_id;       

       $this->validate($request,[
            "name"  => "required",
            "email" => "required|email:rfc,dns|unique:users,email,".$id,
            "user_image" => "Mimes:jpg,jpeg,png,JPEG",
            "user_type" => "required|in:admin,support",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['type'] = $request->user_type;
        if( $request->status ){
            $data['status'] = $request->status;
        }

        $image = $request->file('user_image');
        if($image){
            $image_name = time();
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(300, 300);
            $image_fullname = $image_name.'.'.$ext;
            $path = public_path($this->filePath);
            $image_path = $path.$image_fullname; 

            $success = $img->save($image_path);
            if($success){
                $data['photo'] = $image_fullname;

                $userInfo = user::findOrFail($id);
                if( $userInfo->photo ){
                    if( file_exists( public_path($this->filePath.$userInfo->photo) ) ){
                        unlink(public_path($this->filePath.$userInfo->photo));
                    }
                }
                
            }
        }

        $save = User::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Updated");
            return Redirect::to("users");
        }else{
            Session::flash("error_msg","Failed to Update");
            return Redirect::to("users/edit/".$id);
        }
        
    }

    public function updatePassword(Request $request){
        $id = $request->user_id;

        $this->validate($request,[
            "password" => "required|min:6",
            "confirm_password" => "required|same:password",
        ]);
        $data = array();
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);

        $save = User::where('id', $id)->update($data);

        if($save){
            Session::flash("pass_success_msg","Successfully Update Password");
            return Redirect::to("users/edit/".$id);
        }else{
            Session::flash("pass_error_msg","Failed to Update Password");
            return Redirect::to("users/edit/".$id);
        }
        
    }

    public function Delete($id){   
        $data = array();
        $data['status'] = 'delete';

        $save = User::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Deleted");
        }else{
            Session::flash("error_msg","Failed to Deleted");
        }

        return Redirect::to("users");
        
    }
}
