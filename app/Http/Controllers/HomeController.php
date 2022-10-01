<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\Reservation;
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
    public function reservation(Request $request)
    {
        $reservation = new reservation;
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->guest = $request->guest;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;
        $reservation->save();
        return redirect()->back()->with('message', 'Reservation request sent successfully, we will confirm to you shortly by phone or email');
    }
}
