<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoGrapherController extends Controller
{
    public function index()
    {
        return view('project.videographer.index');
    }
}
