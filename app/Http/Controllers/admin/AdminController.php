<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

// use Auth;
// use App\Http\Controllers\Hash;
// use Hash;
class AdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function updateadminpassword(Request $request)
    {

        //  echo "<pre> "; print_r(Auth::guard('admin')->user()); die;
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();


        return view('admin.settings.updateadmin_password')->with(compact('adminDetails'));
    }

    public function updateAdminTable(Request $request){
        $data = $request->all();
        echo "<pre>"; print_r($data); die;

    }

    public function login(Request $request)
    {
        $data = $request->all();

        // echo $passowrd =Hash::make('12345678');
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];

            $CustomMessages = [

                'email.required' => 'Email Address is required!',
                'email.email' => 'valid Address email is required',
                'password' => 'password is required'
            ];

            $this->validate($request, $rules, $CustomMessages);

            //  echo "<pre> "; print_r($data); die;
            if (Auth::guard('admin')->attempt([
                'email' => $data['email'], 'password' => $data['password'], 'status' => 1
            ])) {
                $data = $request->all();
                return redirect('admin/dashboard');
                //  echo "<pre> "; print_r($data); die;
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or password');
                // dd($data);
            }

            // return view('admin.dashboard');

        }
        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard()->logout();
        return redirect('admin/login');
    }
}
