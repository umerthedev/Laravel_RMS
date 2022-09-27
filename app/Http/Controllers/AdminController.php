<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function useraction()
    {
        $data = user::all();
        return view('admin.user',compact('data'));
    }
    
    public function delete_u($id)
    {
        $del = user::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }
}
