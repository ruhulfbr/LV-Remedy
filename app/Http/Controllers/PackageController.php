<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Package;
use Redirect;
use Session;
use DB;

class PackageController extends Controller
{
    public $module = "package";
    public $modulePath = "package";
    public $filePath = "media/package/";
    public $tableName = "packages";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Index($id=false){
        $data = array();
        $data['title'] = "Manage Packages";
        $data['section'] = $this->module;
        $data['file_path'] = $this->filePath;
        $data['packages'] = Package::all();
        if( $id ){
            $data['package'] = Package::findOrFail($id);
        }
        return view($this->modulePath.'/index', $data);
    }

    public function Store(Request $request){

       $this->validate($request,[
            "name"  => "required",
            "price"  => "required",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        if( $request->description ){
            $data['description'] = $request->description;
        }
        $data['status'] = "active";

        $save = Package::create($data);
        if($save){
            Session::flash("success_msg","Successfully Saved");            
        }else{
            Session::flash("error_msg","Failed to Saved");
        }

        return Redirect::to($this->module);
        
    }

    public function Update(Request $request){

       $id = $request->id;       

       $this->validate($request,[
            "name"  => "required",
            "price" => "required",
            "status"  => "required",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        if( $request->description ){
            $data['description'] = $request->description;
        }
        $data['status'] = $request->status;

        $save = Package::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Updated");
            
        }else{
            Session::flash("error_msg","Failed to Update");
        }

        return Redirect::to($this->module);
        
    }

    public function Delete($id){   
        $data = array();
        $data['status'] = 'delete';

        $save = Package::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Deleted");
        }else{
            Session::flash("error_msg","Failed to Deleted");
        }

        return Redirect::to($this->module);
        
    }
}
