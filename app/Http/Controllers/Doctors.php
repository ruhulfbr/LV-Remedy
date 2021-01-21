<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Doctor;
use App\Category;
use Redirect;
use Session;
use DB;

class Doctors extends Controller
{
    private $module = "doctors";
    private $modulePath = "doctors";
    private $filePath = "media/doctors/";
    private $tableName = "doctors";

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
        $data['title'] = "Manage ".$this->module;
        $data['section'] = $this->module;
        $data['file_path'] = $this->filePath;
        $data['doctors'] = Doctor::where('status','!=','delete')->get();
        return view($this->modulePath.'/index', $data);
    }

    public function Create(){
        $data = array();
        $data['title'] = 'Create Doctor';
        $data['section'] = $this->module;
        $data['categories'] = Category::where('status','active')->get();
        return view($this->modulePath.'/create', $data);
    }

    public function Store(Request $request){

        $this->validate($request,[
            "full_name"  => "required",
            "email" => "required|email:rfc,dns|unique:doctors",
            "phone" => "required|numeric|digits_between:11,13",
            "password" => "required|min:6",
            "confirm_password" => "required|same:password",
            "doctor_image" => "required|Mimes:jpg,jpeg,png,JPEG",
            "qualification"  => "required",
            "current_workplace"  => "required",
            "current_workplace_designation"  => "required",
            "specialized"  => "required",
            "category"  => "required|array",
        ]);

        $data = array();
        $data['full_name'] = $request->full_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $data['qualification'] = $request->qualification;
        $data['current_workplace'] = $request->current_workplace;
        $data['current_workplace_designation'] = $request->current_workplace_designation;
        $data['specialized'] = $request->specialized;
        $data['category'] = json_encode($request->category);

        $image = $request->file('doctor_image'); 
        $imageName = $this->uploadFile($image);

        if($imageName){
            $data['photo'] = $imageName;
        }else{
            Session::flash("error_msg","File not upload");    
            return Redirect::to($this->module."/create");
        }

        $save = Doctor::create($data);

        if($save){
            Session::flash("success_msg","Successfully Saved");
            return Redirect::to($this->module);
        }else{
            Session::flash("error_msg","Failed to Saved");
            return Redirect::to($this->module."/create");
        }
        
    }

    public function Edit($id){
        $data = array();
        $data['title'] = 'Edit Doctor';
        $data['section'] = $this->module;
        $data['doctor'] = $doctor = Doctor::findOrFail($id);

        $categories = !empty( $doctor ) ? json_decode($doctor->category) : [];
        $data['category'] = (array) $categories;

        $data['categories'] = Category::where('status','active')->get();
        return view($this->modulePath.'/edit', $data);
    }

    public function Update(Request $request){

       $id = $request->doctor_id;      
        $this->validate($request,[
            "full_name"  => "required",
            "email" => "required|email:rfc,dns|unique:doctors,email,".$id,
            "phone" => "required|numeric|digits_between:11,13",
            "doctor_image" => "Mimes:jpg,jpeg,png,JPEG",
            "qualification"  => "required",
            "current_workplace"  => "required",
            "current_workplace_designation"  => "required",
            "specialized"  => "required",
            "category"  => "required|array",
            "status" => "required",
        ]);

        $data = array();
        $data['full_name'] = $request->full_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['qualification'] = $request->qualification;
        $data['current_workplace'] = $request->current_workplace;
        $data['current_workplace_designation'] = $request->current_workplace_designation;
        $data['specialized'] = $request->specialized;
        $data['category'] = json_encode($request->category);

        $image = $request->file('doctor_image');
        if($image){
            $doctor = Doctor::findOrFail($id);
            $image_name = $this->uploadFile($image, $doctor->photo);

            if($image_name){
                $data['photo'] = $image_name;                
            }else{
                Session::flash("error_msg","File not upload");    
                return Redirect::to($this->module."edit/".$id);
            }
        }

        $save = Doctor::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Updated");
            return Redirect::to($this->module);
        }else{
            Session::flash("error_msg","Failed to Update");
            return Redirect::to($this->module."/edit/".$id);
        }
        
    }


    public function resetPassword($id){
        $password = "123456";
        $data = array();
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);

        $save = Doctor::where('id', $id)->update($data);

        if($save){
            Session::flash("success_msg","Successfully Reset Password");
        }else{
            Session::flash("error_msg","Failed to Reset Password");
        }

        return Redirect::to($this->module);
    }

    public function updateStatus($id, $status){   
        $data = array();
        $data['status'] = $status;

        $save = Doctor::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully update status");
        }else{
            Session::flash("error_msg","Failed to change status");
        }

       return Redirect::to($this->module);
        
    }

    public function Delete($id){   
        $data = array();
        $data['status'] = 'delete';

        $save = Doctor::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Deleted");
        }else{
            Session::flash("error_msg","Failed to Deleted");
        }

        return Redirect::to($this->module);
        
    }

    public function timeSlot($doctor_id, $slot_id=false){
        $data = array();
        $data['doctor'] = $doctor = Doctor::findOrFail($doctor_id);
        $data['title'] = "Dr. ".$doctor->full_name."'s Time Slots";
        $data['section'] = $this->module;

        $data['time_slots'] = DB::table('doctor_time_slot')->where('doctor_id',$doctor_id)->get();
        if( $slot_id ){
            $data['time_slot'] = DB::table('doctor_time_slot')->where('id',$slot_id)->first();
        }
        return view($this->modulePath.'/time_slot', $data);
    }

    public function updateTimeSlot(Request $request, $doctor_id, $slot_id=false){    

        $this->validate($request,[
            "slot_day"  => "required",
            "slot_time" => "required",
        ]);

        $data = array();
        $data['slot_day'] = $request->slot_day;
        $data['slot_time'] = $request->slot_time;

        if( $request->status ){
            $data['status'] = $request->status;
        }

        if( $slot_id ){
            $save = DB::table('doctor_time_slot')->where('id', $slot_id)->update($data);
        }else{
            $data['doctor_id'] = $doctor_id;
            $save = DB::table('doctor_time_slot')->insert($data);
        }

        if($save){
            Session::flash("success_msg","Successfully Saved");
            return Redirect::to($this->module."/time-slot/".$doctor_id);
        }else{
            Session::flash("error_msg","Failed to Saved");
            if( $slot_id ){
                return Redirect::to($this->module."/time-slot/".$doctor_id."/".$slot_id);
            }
            return Redirect::to($this->module."/time-slot/".$doctor_id);
        }
    }

    public function deleteTimeSlot($doctor_id, $id){

        $query = DB::table('doctor_time_slot')->where('id',$id)->delete();

        if($query){
            Session::flash("success_msg","Successfully Deleted");
            
        }else{
            Session::flash("error_msg","Failed to Delete");
        }

        return Redirect::to($this->module."/time-slot/".$doctor_id);
    }

    private function uploadFile($image, $oldImage=false){
        $image_name = time();
        $ext = strtolower($image->getClientOriginalExtension());
        $img = Image::make($image->getRealPath())->resize(300,300);
        $image_fullname = $image_name.'.'.$ext;
        $path = public_path($this->filePath);
        $image_path = $path.$image_fullname; 

        $success = $img->save($image_path);

        if( $success && $oldImage && !empty( $oldImage ) ){
            if( file_exists( public_path($this->filePath.$oldImage) ) ){
                unlink(public_path($this->filePath.$oldImage));
            } 
        }

        if( $success ){
            return $image_fullname;
        }else{
            return false;
        }
        
    }
}
