<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;

class Home extends BaseController
{
    public function index()
    {        
        return view('home', ['title' => 'Home']);
    }
}
