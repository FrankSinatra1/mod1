<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
    	$auth = Auth::all();

    	$auth->name = $request->get('name');
    	$auth->password = $request->get('password');

    	if ($auth->name == "admin" && $auth->password == "admin") {
    		return view("admin", compact("auth"));
    	}else {
    		return redirect("/");
    	}

    }
}
