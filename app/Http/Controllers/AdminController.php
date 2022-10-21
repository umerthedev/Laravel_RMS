<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Foodchef;
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

    public function reservation()
    {
        $data = reservation::paginate(5);
        return view('admin.Allreservation',compact('data'));
    }

    public function delete_reservation($id)
    {
        $del = reservation::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Reservation Deleted Successfully');
    }


    //add chef 
    public function add_chef()
    {
        
        return view('admin.add_chef');
    }

    //upload chef
    public function upload_chef(Request $request)
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
    //show all chef
    public function chef_list()
    {
        $foodchef = foodchef::paginate(5);
        return view('admin.chef_list',compact('foodchef'));
    }
    //show edit chef
    public function edit_chef($id)
    {
        $data = foodchef::find($id);
        return view('admin.edit_chef',compact('data'));
    }
    //update chef
    public function update_chef(Request $request, $id)
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
    //delete chef
    public function delete_chef($id)
    {
        $del = foodchef::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Chef Deleted Successfully');
    }
    public function show_orders()
    {
        $oreders = order::all();
        return view('admin.show_orders',compact('oreders'));
    }
    public function delete_orders($id)
    {
        $del = order::find($id);
        $del->delete();
        return redirect()->back()->with('message', 'Order Deleted Successfully');
    }
    //search
    public function search(Request $request)
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
}
