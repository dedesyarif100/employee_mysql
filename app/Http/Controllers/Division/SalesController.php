<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('division.sales.index');
    }
}
