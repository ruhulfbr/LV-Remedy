<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Banner;
use Redirect;
use Session;
use DB;

class BannerController extends Controller
{
    private $module = "banners";
    private $modulePath = "banners";
    private $filePath = "media/banners/";
    private $tableName = "banners";
    private $bannerSize = "800, 350";


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
        $data['title'] = "Manage Banners";
        $data['section'] = $this->module;
        $data['file_path'] = $this->filePath;
        $data['banners'] = Banner::all();
        return view($this->modulePath.'/index', $data);
    }

    public function Create(){
        $data = array();
        $data['title'] = 'Create Banner';
        $data['section'] = $this->module;
        return view($this->modulePath.'/create', $data);
    }

    public function Store(Request $request){

       $this->validate($request,[
            "title_1"  => "required",
            "banner_image" => "required|Mimes:jpg,jpeg,png,JPEG",
        ]);
        $data = array();
        $data['title_1'] = $request->title_1;
        $data['title_2'] = $request->title_2 ? $request->title_2 :"";
        $data['description'] = $request->description ? $request->description :"";
        $data['link'] = $request->link ? $request->link :"";

        $image = $request->file('banner_image'); 
        $imageName = $this->uploadFile($image);

        if($imageName){
            $data['photo'] = $imageName;
        }else{
            Session::flash("error_msg","File not upload");    
            return Redirect::to($this->module."/create");
        }
        
        $save = Banner::create($data);
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
        $data['title'] = 'Edit Banner';
        $data['section'] = $this->module;
        $data['banner'] = Banner::findOrFail($id);
        return view($this->modulePath.'/edit', $data);
    }

    public function Update(Request $request){

       $id = $request->banner_id;       

       $this->validate($request,[
            "title_1"  => "required",
            "status" => "required|in:active,inactive",
        ]);
        $data = array();
        $data['title_1'] = $request->title_1;
        $data['title_2'] = $request->title_2 ? $request->title_2 :"";
        $data['description'] = $request->description ? $request->description :"";
        $data['link'] = $request->link ? $request->link :"";
        $data['status'] = $request->status;
        

        $image = $request->file('banner_image');
        if($image){
            $banner = Banner::findOrFail($id);
            $image_name = $this->uploadFile($image, $banner->photo);

            if($image_name){
                $data['photo'] = $image_name;                
            }else{
                Session::flash("error_msg","File not upload");    
                return Redirect::to($this->module."edit/".$id);
            }
        }

        $save = Banner::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully Updated");
            return Redirect::to($this->module);
        }else{
            Session::flash("error_msg","Failed to Update");
            return Redirect::to($this->module."edit/".$id);
        }
        
    }


    public function Delete($id){  

        $banner = Banner::findOrFail($id);
        $delete = Banner::where('id', $id)->delete();
        if($delete){
            
            if( file_exists( public_path($this->filePath.$banner->photo) ) ){
                unlink(public_path($this->filePath.$banner->photo));
            }

            Session::flash("success_msg","Successfully Deleted");
        }else{
            Session::flash("error_msg","Failed to Deleted");
        }
        return Redirect::to($this->module);
    }

    public function updateStatus($id, $status){   
        $data = array();
        $data['status'] = $status;

        $save = Banner::where('id', $id)->update($data);
        if($save){
            Session::flash("success_msg","Successfully update status");
        }else{
            Session::flash("error_msg","Failed to change status");
        }

       return Redirect::to($this->module);
        
    }

    private function uploadFile($image, $oldImage=false){
        $image_name = time();
        $ext = strtolower($image->getClientOriginalExtension());
        $img = Image::make($image->getRealPath())->resize($this->bannerSize);
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
