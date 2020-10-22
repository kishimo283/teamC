<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeEventController extends Controller
{
    public function index() {
        return view('MakeEvent');
    }

    public function create() {
        return view('CreateEvent');
    }
}
