<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Auth,Exception,DB;
use App\Profile;
use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth:admin');
    }

    public function index() {

        return view('admin.dashboard');
    }


   
}
