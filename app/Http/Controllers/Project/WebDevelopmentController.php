<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebDevelopmentController extends Controller
{
    public function index()
    {
        return view('project.webdevelopment.index');
    }
}
