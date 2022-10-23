<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Foodchef;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            // return redirect()->back();
            // return view('dashboard');
            return $this->admin();

        }
        else
        {        
        $data = food::all();
        $chef = foodchef::all();
        $user_id = Auth::id();
        $count = cart::where('user_id', $user_id)->count();
        return view('user.index',compact('data','chef','count'));
        }
    }
    public function admin()
    {
        $data=food::all();
        $chef = foodchef::all();
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {

        $user_id = Auth::id();
        $count = cart::where('user_id', $user_id)->count();
            return view('user.index',compact('data','chef','count'));
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
    //add to cart
    public function add_to_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;
            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();    
            return redirect()->back()->with('message', 'Food added to cart successfully');
        }
        else
        {
            return redirect()->route('login');
        }
    }
    //show cart
    public function showcart(Request $request , $id)
    {
        

        if(Auth::id() == $id)
        {
        $user_id = Auth::id();       
        $cart = cart::where('user_id',$id)
        ->join('food','carts.food_id','food.id')
        ->select('carts.*','food.name','food.price','food.image')
        ->get();
        // $cart = cart::where('user_id',$id)->join('food','carts.food_id', '=','food_id')->get();
        $count = cart::where('user_id', $user_id)->count();        
        return view('user.showcart',compact('cart','count'));
        }
        else
        {
            return redirect()->back();
        }
    }
    //delete cart
    public function removecart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'Food deleted from cart successfully');
    }
   
    public function ordernow(Request $request)
    {
        // $user_id = Auth::id();
        // $allcart = cart::where('user_id',$user_id)->get();
        // foreach($allcart as $cart)
        // {
        //     $order = new order;
        //     $order->user_id = $cart['name'];
        //     $order->food_id = $cart['food_id'];
        //     $order->quantity = $cart['quantity'];
        //     // $order->status = "pending";
        //     // $order->payment_method = $request->payment;
        //     // $order->payment_status = "pending";
        //     $order->address = $request->address;
        //     $order->save();
        //     cart::where('user_id',$user_id)->delete();
        // }
        // return redirect()->route('user.index')->with('message', 'Order placed successfully');

        foreach($request->food_name as $key => $foodname)
        {
            $user_id = Auth::id();
            $order = new order;
            $order -> food_name = $foodname;
            $order -> price = $request->price[$key];
            $order -> quantity = $request->quantity[$key];
            $order -> name = $request->name;
            $order -> phone = $request->phone;
            $order -> address = $request->address;
            $order ->save();
            cart::where('user_id',$user_id)->delete();

        }
       
        
        return redirect()->back()->with('message', 'Order placed successfully');

    }
}
