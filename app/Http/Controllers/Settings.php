<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Redirect;
use Session;
use DB;

class Settings extends Controller
{
    private $module = "settings";
    private $modulePath = "settings";
    private $tableName = "settings";

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
        $data['title'] = "Manage Settings";
        $data['section'] = $this->module;

        return view($this->modulePath.'/index', $data);
    }

    public function Update(Request $request){

        if( !empty( $_POST ) ){
            foreach ($_POST as $key => $value) {
                if( $key != '_token' ){
                    updateSettingsValue($key, $value);
                }
               
            }
        }

        Session::flash("success_msg","Successfully Updated");
        return Redirect::to($this->module);
        
    }

}
