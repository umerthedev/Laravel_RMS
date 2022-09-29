<?php

namespace App\Http\Controllers;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = food::all();
        return view('user.index',compact('data'));
    }
    public function admin()
    {
        $data=food::all();
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('user.index',compact('data'));
        }
    }
}
