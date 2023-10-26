<?php

namespace App\Http\Controllers;

use App\Events\NewOrderEvent;
use App\Events\OrderPlaced;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function admin()
    {
        $orders = Order::all();
        return view('admin', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'name'=> $request->input('name'),
            'status' => 0
        ]);
        event(new OrderPlaced($order));
        return redirect('/order')->with('success', 'Order has been added');
    }

    public function foystore (StoreOrderRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    public function check()
    {
        $orders = Order::where('status', 0)->get();
        if(count($orders) > 0){
            return true;
        }else{
            return false;
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $update = Order::where('id', $order->id)
              ->update([
                  'status' => 1,
              ]);
        return redirect('/admin')->with('success', 'Order information updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($order)
    {
//        dd("sjkdfhg");
        $data = Order::findOrFail($order);
        // dd($data);
        if($data){
            $data->delete();
            return back()->with('success', 'Order has been deleted.');
        }else{
            return back()->with('error', 'Something went wrong!');
        }
    }
}
