<?php

namespace App\Http\Controllers;
use Redirect;


class Dashboard extends Controller{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = array();
        $data['title'] = 'Dashboard';
        $data['active'] = 'Dashboard';

        return view('index',$data);
    }
    

}



// INSERT INTO games (game_name, game_category, game_size, game_link) SELECT movie_name, '1', movie_size, movie_link from movies WHERE movie_category=14
