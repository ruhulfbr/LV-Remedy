<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Category;
use Redirect;
use Session;
use DB;

class CategoryController extends Controller
{
    public $module = "category";
    public $modulePath = "category";
    public $filePath = "media/category/";
    public $tableName = "categories";

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
        $data['title'] = "Manage Categories";
        $data['section'] = $this->module;
        $data['file_path'] = $this->filePath;
        $data['categories'] = Category::all();
        if( $id ){
            $data['category'] = Category::findOrFail($id);
        }
        return view($this->modulePath.'/index', $data);
    }

    public function Store(Request $request){

       $this->validate($request,[
            "name"  => "required",
            "image" => "Mimes:jpg,jpeg,png,JPEG",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['status'] = "active";

        $image = $request->file('image');
        if($image){
            $image_name = time();
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(200, 200);
            $image_fullname = $image_name.'.'.$ext;
            $path = public_path($this->filePath);
            $image_path = $path.$image_fullname; 

            $success = $img->save($image_path);
            if($success){
                $data['photo'] = $image_fullname;
            }
        }

        $save = Category::create($data);
        if($save){
            Session::flash("success_msg","Successfully Saved");            
        }else{
            Session::flash("error_msg","Failed to Saved");
        }

        return Redirect::to("category");
        
    }

    public function Update(Request $request){

       $id = $request->id;       

       $this->validate($request,[
            "name"  => "required",
            "image" => "Mimes:jpg,jpeg,png,JPEG",
            "status"  => "required",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['status'] = $request->status;

        $image = $request->file('image');
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

                $category = Category::findOrFail($id);
                if( $category->photo ){
                    if( file_exists( public_path($this->filePath.$category->photo) ) ){
                        unlink(public_path($this->filePath.$category->photo));
                    }
                }
                
            }
        }

        $save = Category::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Updated");
            
        }else{
            Session::flash("error_msg","Failed to Update");
        }

        return Redirect::to("category");
        
    }

    public function Delete($id){   
        $data = array();
        $data['status'] = 'delete';

        $save = Category::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Deleted");
        }else{
            Session::flash("error_msg","Failed to Deleted");
        }

        return Redirect::to("Category");
        
    }
}
