<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Redirect;
use Session;
use DB;

class Home extends Controller
{
    private $module = "Home";
    private $modulePath = "web/";
    private $bannerPath = "media/banners/";

    public function __construct()
    {
    
    }

    public function Index(){
        $data = array();
        $data['title'] = "Home";
        $data['section'] = $this->module;
        $data['banners'] = DB::table('banners')->where('status','active')->get();
        $data['banner_path'] = $this->bannerPath;
        return view($this->modulePath.'/index', $data);
    }

}