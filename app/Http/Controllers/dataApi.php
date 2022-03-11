<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dataApi extends Controller
{
    function articleData()
    {
        return [
            "id" => "0",
            "name" => "Jawad",
            "email" => "jawad@mail.com",
            "job_title" => "Software Developer",
            "state" => "PU",
            "natoionality" => "Pak"
        ];
    }
}
