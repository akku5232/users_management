<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Auth,Exception,DB;
use App\Profile;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile() {

        $cities = City::get();

        return view('users.profile')->with('cities',$cities);
    }

    public function profile_save(Request $request) {

        try {

            DB::begintransaction();

            $user_details = Auth::user();

            $user_profile_details = Profile::where('user_id',$user_details->id)->first(); 

            if(!$user_profile_details) {

                $user_profile_details = new Profile;

            }

            $user_profile_details->user_id = $request->user_id;

            $user_profile_details->present_location = $request->present_location;

            $user_profile_details->prefered_location = $request->prefered_location;

            $user_profile_details->sslc = $request->sslc;

            $user_profile_details->puc = $request->puc;

            $user_profile_details->degree = $request->degree;

            $user_profile_details->stream = $request->stream;

            $user_profile_details->passed_out_year = $request->passed_out_year;

            $user_profile_details->college_name = $request->college_name;

            $user_profile_details->city_id = $request->city_id;

            $user_profile_details->company_details = $user_details->user_type == 2 ? $request->company_details : '';

            $user_profile_details->company_name = $user_details->user_type == 2 ? $request->company_name : '';
            $user_profile_details->role = $user_details->user_type == 2 ? $request->role : '';

            $user_profile_details->joining_date = $user_details->user_type == 2 ? $request->joining_date : Carbon::now();
            $user_profile_details->skills = $user_details->user_type == 2 ? $request->skills : '';

            if($user_profile_details->save()){

                DB::commit();

                return redirect()->back()->with('success','User details updated successfully');
            }

            throw new Exception("Failed to save the user details", 101);
            
        } catch(Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    
    }
}
