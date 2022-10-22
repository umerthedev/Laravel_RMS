<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Foodchef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function useraction()
    {
        if(Auth::id())
        {  
        $data = user::paginate(5);
        return view('admin.user',compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }
    
    public function delete_u($id)
    {
        if(Auth::id()==$id)
        {  
        $del = user::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully');
        }
        else
        {
            return redirect()->back();
        }
    }


    public function showfood()
    {
        if(Auth::id())
        {          
        return view('admin.addfood');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function upload_foodmanu(Request $request)
    {
        if(Auth::id())
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
        else
        {
            return redirect()->back();
        }
    }

    public function showAllfood()
    {
        if(Auth::id())
        {
        $data = food::paginate(5);
        return view('admin.showfood',compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function edit_food($id)
    {
        if(Auth::id())
        {        
        $data = food::find($id);
        return view('admin.editfood',compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function update_foodmanu(Request $request, $id)
    {
        if(Auth::id())
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
        else
        {
            return redirect()->back();
        }
    }
    public function delete_food($id)
    {
        if(Auth::id() )
        {
        $del = food::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Food Item Deleted Successfully');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function reservation()
    {
        if(Auth::id())
        {          
        $data = reservation::paginate(5);
        return view('admin.Allreservation',compact('data'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function delete_reservation($id)
    {
        if(Auth::id())
        {
        $del = reservation::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Reservation Deleted Successfully');
        }
        else
        {
            return redirect()->back();
        }
    }


    //add chef 
    public function add_chef()
    {
        if(Auth::id())
        {        
        return view('admin.add_chef');
        }
        else
        {
            return redirect()->back();
        }
    }

    //upload chef
    public function upload_chef(Request $request)
    { 
        if(Auth::id())
        {
        $chef = new foodchef;
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $image =$request->image;
        $iamge_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('admin_assets/chefimage',$iamge_name);
        $chef->image=$iamge_name;
        $chef->save();
        return redirect()->back()->with('message', 'Chef Added Successfully');
        }
        else
        {
            return redirect()->back();
        }

    }
    //show all chef
    public function chef_list()
    {
        if(Auth::id())
        {
        $foodchef = foodchef::paginate(5);
        return view('admin.chef_list',compact('foodchef'));
        }
        else
        {
            return redirect()->back();
        }
    }
    //show edit chef
    public function edit_chef($id)
    {
        if(Auth::id())
        {
        
        $data = foodchef::find($id);
        return view('admin.edit_chef',compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }
    //update chef
    public function update_chef(Request $request, $id)
    {
        if(Auth::id()==$id)
        {
        $chef = foodchef::find($id);
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $image =$request->image;
        if($image){
        $iamge_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('admin_assets/chefimage',$iamge_name);
        $chef->image=$iamge_name;
        }
        $chef->save();
        return redirect()->back()->with('message', 'Chef Updated Successfully');
        }
        else
        {
            return redirect()->back();
        }
    }
    //delete chef
    public function delete_chef($id)
    {
        if(Auth::id()==$id)
        {
        $del = foodchef::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Chef Deleted Successfully');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function show_orders()
    {
        if(Auth::id())
        {
        $oreders = order::all();
        return view('admin.show_orders',compact('oreders'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function delete_orders($id)
    {
        if(Auth::id())
        {
        $del = order::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Order Deleted Successfully');
        }
        else
        {
            return redirect()->back();
        }
    }
    //search
    public function search(Request $request)
    {
        if(Auth::id())
        {
        $output = '';        
        $order = order::where('name','like','%'.$request->search.'%')->orWhere('address','like','%'.$request->search.'%')->orWhere('phone','like','%'.$request->search.'%')->orWhere('food_name','like','%'.$request->search.'%')->get();
        
        foreach ($order as $searchorder) {
            $output.=             
            '<tr>
            <td>'.$searchorder->name.'</td>
            <td>'.$searchorder->phone.'</td>
            <td>'.$searchorder->address.'</td>
            <td>'.$searchorder->food_name.'</td>
            <td>'.$searchorder->price.'</td>
            <td>'.$searchorder->quantity.'</td>
            <td>'.$searchorder->price * $searchorder->quantity .'</td>
            
            <td>
            
            <a href="'.url('delete_orders',$searchorder->id).'" class="btn btn-danger">Delete</a>
            </td>                       
            </tr>';
        }

        return response()->json($output);
        }
        else
        {
            return redirect()->back();
        }
    }
}
