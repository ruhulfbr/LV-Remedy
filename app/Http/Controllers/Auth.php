<?php

namespace App\Http\Controllers;
use Redirect;


class Auth extends Controller{
    public function __construct(){

    }

    public function index(){
        $data = array();
        $data['title'] = 'Dashboard';
        $data['active'] = 'Dashboard';

        return view('login',$data);
    }
    

}



// INSERT INTO games (game_name, game_category, game_size, game_link) SELECT movie_name, '1', movie_size, movie_link from movies WHERE movie_category=14
