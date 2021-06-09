<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\Admin;

class AdminLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

   
    use AuthenticatesUsers;

    // *
    //  * Where to redirect users after login.
    // *
    // * @var string
    
    // protected $redirectTo = '/admin';

    // protected $redirectAfterLogout = '/admin/login';


    public function login(Request $request) {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
         ]);
     
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            dd($request->all());
            if(Auth::guard('admin')->check()) {

                if($admin = Admin::find(Auth::guard('admin')->user()->id)) {

                    $admin->save();

                }  

            };

            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'))->with('success','Login successfully');
        } 
     
        // if unsuccessful, then redirect back to the login with the form data
     
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error','Username and password didnot match');
    }

    public function logout() {

        Auth::guard('admin')->logout();
        
        return redirect()->route('admin.login')->with('success', 'you have logout successfully');
    }

}