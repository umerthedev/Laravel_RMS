<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Food;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function useraction()
    {
        $data = user::paginate(5);
        return view('admin.user',compact('data'));
    }
    
    public function delete_u($id)
    {
        $del = user::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }


    public function showfood()
    {
        
        return view('admin.addfood');
    }
    public function upload_foodmanu(Request $request)
    {
        $food =  new food;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;

        $image =$request->image;
        $iamge_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('admin_assets/foodimage',$iamge_name);

        $food->image=$iamge_name;
        $food->save();
        return redirect()->back()->with('message', 'Food Added Successfully');
    }

    public function showAllfood()
    {
        $data = food::paginate(5);
        return view('admin.showfood',compact('data'));
    }

    public function edit_food($id)
    {
        $data = food::find($id);
        return view('admin.editfood',compact('data'));
    }

    public function update_foodmanu(Request $request, $id)
    {
        $food = food::find($id);
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;
        
        $image =$request->image;
        if($image){
        $iamge_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('admin_assets/foodimage',$iamge_name);
        $food->image=$iamge_name;
        }
        $food->save();
        return redirect()->back()->with('message', 'Food Updated Successfully');
    }
    public function delete_food($id)
    {
        $del = food::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Food Item Deleted Successfully');
    }
}
