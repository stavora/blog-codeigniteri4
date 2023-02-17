<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BannerHome extends BaseController
{
    public function index()
    {
        sleep(3);

        return view('_partials/_bannerHome');
    }
}
