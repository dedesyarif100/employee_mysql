<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index()
    {
        return view('division.marketing.index');
    }
}
