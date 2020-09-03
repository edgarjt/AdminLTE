<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('CheckRole');
    }

    public function getUser() {
        return view('users.user');
    }
}
