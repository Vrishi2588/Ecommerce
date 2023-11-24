<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {

            return redirect('/admin/dashboard');
        } else {

            // return redirect('admin');
            return view('admin.login');
        }
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        //return $request->all();
        $email = $request->post('email');
        $password = $request->post('password');

        // checking th model
        //$result = Admin::where(['email' => $email, 'password' => $password])->get();
        $result = Admin::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            } else {
                return redirect('admin')->with('error', 'please enter the correct details');
                // $request->session()->flash('error', 'please enter the correct details');
                // return redirect('admin');
            }
        } else {
            // $request->session()->flash('error', 'please enter the valid details');
            // return redirect('admin');
            return redirect('admin')->with('error', 'please enter the valid details');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
