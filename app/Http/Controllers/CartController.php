<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Model\Cart;
use App\Model\CartDetail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::select('products.*','cart_details.*', 'users.name as cliente', 'carts.status')
            ->join('cart_details','cart_details.cart_id','=','carts.id')
            ->join('products','cart_details.product_id','=','products.id')
            ->join('users','carts.user_id','=','users.id')
            ->where('carts.status','=','Pending')
            ->get();
        return view ("admin.orders.index", compact('carts'));
    }

    public function today($day)
    {
        $carts = Cart::select('products.*','cart_details.*', 'users.name as cliente', 'carts.status')
            ->join('cart_details','cart_details.cart_id','=','carts.id')
            ->join('products','cart_details.product_id','=','products.id')
            ->join('users','carts.user_id','=','users.id')
            ->where('carts.status','=','Finalizado')
            ->where('carts.order_date','=',$day)
            ->get();
        $users = User::all();
        return view ("admin.orders.oneday", compact('carts', 'day'));
    }

    public function someday(Request $request)
    {
        $day=$request->input('date');
        $carts = Cart::select('products.*','cart_details.*', 'users.name as cliente', 'carts.status')
            ->join('cart_details','cart_details.cart_id','=','carts.id')
            ->join('products','cart_details.product_id','=','products.id')
            ->join('users','carts.user_id','=','users.id')
            ->where('carts.status','=','Finalizado')
            ->where('carts.order_date','=',$day)
            ->get();
        return view ("admin.orders.oneday", compact('carts', 'day'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now();
    	$cart->save(); // UPDATE

        $notification = 'Tu pedido se ha registrado correctamente. Estará listo en unos minutos!';
    	return back()->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function select($id)
    {
        /* ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]); */

        $cart = Cart::find($id);
        $cart->status = "Finalizado";
        $cart->save();

        return back();
    }
}
