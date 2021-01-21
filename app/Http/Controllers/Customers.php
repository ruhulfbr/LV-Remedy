<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Customer;
use Redirect;
use Session;
use DB;

class Customers extends Controller
{
    private $module = "customers";
    private $modulePath = "customers";
    private $filePath = "media/customers/";
    private $tableName = "customers";

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
        $data['customers'] = Customer::where('status','!=','delete')->get();
        return view($this->modulePath.'/index', $data);
    }

    public function Create(){
        $data = array();
        $data['title'] = 'Create Customer';
        $data['section'] = $this->module;
        return view($this->modulePath.'/create', $data);
    }

    public function Store(Request $request){

        $this->validate($request,[
            "full_name"  => "required",
            "email" => "email:rfc,dns",
            "phone" => "required|numeric|digits_between:11,13",
            "zip_code" => "required|numeric",
            "password" => "required|min:6",
            "confirm_password" => "required|same:password",
        ]);
        $data = array();
        $data['full_name'] = $request->full_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $data['type'] = 'registered';
        $data['registration_date'] = date('Y-m-d H:i:s');
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['zip_code'] = $request->zip_code;
        $data['user_id'] = $request->zip_code;

        $customer = Customer::create($data);
        $customerId = $customer->id;
        $userId = generateCustomerId($customerId);
        $save = Customer::where('id',$customerId)->update(array('user_id'=>$userId));

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
        $data['title'] = 'Edit Customer';
        $data['section'] = $this->module;
        $data['customer'] = Customer::findOrFail($id);
        return view($this->modulePath.'/edit', $data);
    }

    public function Update(Request $request){

       $id = $request->customer_id;      

        $this->validate($request,[
            "full_name"  => "required",
            "email" => "required|email:rfc,dns|unique:users,email,".$id,
            "phone" => "required|numeric|digits_between:11,13",
            "zip_code" => "required|numeric",
            "status" => "required",
        ]);


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['type'] = $request->user_type;

        $data = array();
        $data['full_name'] = $request->full_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['zip_code'] = $request->zip_code;
        $data['status'] = $request->status;

        $save = Customer::where('id', $id)->update($data);
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

        $save = Customer::where('id', $id)->update($data);

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

        $save = Customer::where('id', $id)->update($data);
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

        $save = Customer::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Deleted");
        }else{
            Session::flash("error_msg","Failed to Deleted");
        }

        return Redirect::to($this->module);
        
    }
}
