<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::join('products', 'orders.product_id', '=', 'products.id')
    ->select('orders.*', 'products.name', 'products.quantity as product_quantity') // Include the product's quantity
    ->get();

return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $products =Product::all();
        $products2 = Product::all();
        return view('orders.create', compact('products','products2'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $order = new Order;
         $order->deliveryStatus = $request->deliveryStatus;
         $order->vehicle = $request->vehicle;
         $order->customer_id = $request->customer_id;
         $order->product1_quantity = $request->input('Product1_quantity', 0);
         $order->product2_quantity = $request->input('Product2_quantity', 0);
         
         if ($request->has('Product_id')) {
             $selectedProduct1 = Product::find($request->Product_id);
             $quantity1 = $request->input('Product1_quantity', 0); // Default to 0 if not provided
     
             if ($selectedProduct1 && $quantity1 > 0 && $selectedProduct1->quantity >= $quantity1) {
                 $order->product_id = $selectedProduct1->id;
     
                 // Subtract the selected quantity from the product's total quantity
                 $selectedProduct1->quantity -= $quantity1;
                 $selectedProduct1->save();
             }
         }
     
         if ($request->has('Product2_id')) {
             $selectedProduct2 = Product::find($request->Product2_id);
             $quantity2 = $request->input('Product2_quantity', 0); // Default to 0 if not provided
     
             if ($selectedProduct2 && $quantity2 > 0 && $selectedProduct2->quantity >= $quantity2) {
                 $order->product2_id = $selectedProduct2->id;
     
                 // Subtract the selected quantity from the product's total quantity
                 $selectedProduct2->quantity -= $quantity2;
                 $selectedProduct2->save();
             }
         }
     
         $order->save();
     
         return redirect()->route('orders.index');
     }

    /**  
     * Display the specified resource.
     */
    public function show(Order $order)
    {
       return view('orders.index', compact('order'));     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $products = Product::all();
        $products2 = Product::all();
        return view('orders.edit', compact('order', 'products', 'products2'));
       }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $products = Product::all();
        $products2 = Product::all(); 
  
        $order->deliveryStatus = $request->deliveryStatus;
        $order->vehicle = $request->vehicle;
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->product2_id = $request->product2_id;
        $order->product1_quantity = $request->input('Product1_quantity', 0);
         $order->product2_quantity = $request->input('Product2_quantity', 0);
         
         if ($request->has('Product_id')) {
             $selectedProduct1 = Product::find($request->Product_id);
             $quantity1 = $request->input('Product1_quantity', 0); // Default to 0 if not provided
     
             if ($selectedProduct1 && $quantity1 > 0 && $selectedProduct1->quantity >= $quantity1) {
                 $order->product_id = $selectedProduct1->id;
     
                 // Subtract the selected quantity from the product's total quantity
                 $selectedProduct1->quantity -= $quantity1;
                 $selectedProduct1->save();
             }
         }
     
         if ($request->has('Product2_id')) {
             $selectedProduct2 = Product::find($request->Product2_id);
             $quantity2 = $request->input('Product2_quantity', 0); // Default to 0 if not provided
     
             if ($selectedProduct2 && $quantity2 > 0 && $selectedProduct2->quantity >= $quantity2) {
                 $order->product2_id = $selectedProduct2->id;
     
                 // Subtract the selected quantity from the product's total quantity
                 $selectedProduct2->quantity -= $quantity2;
                 $selectedProduct2->save();
             }
         }
     

        $order->save();
         
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
