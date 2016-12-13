<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Category;
use Auth;

class CartController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::getCategories();
        $cart = Transaction::with('order')->where('status', Transaction::NOT_SUMMIT)->first();

        return view('transaction.index', [
            'categories' => $categories,
            'cart' => $cart,
        ]);
    }

    public function showOrder($id)
    {
        $categories = Category::getCategories();
        $cart = Transaction::with('order')->where('id', $id)->first();

        return view('transaction.detail', [
            'categories' => $categories,
            'cart' => $cart,
        ]);
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
    public function update(Request $request)
    {
        if(!Auth::user())
        {
            return "NO_AUTHENTICATION";
        } else {
            $cart = Transaction::orderBy("created_at", "DESC")->first();
            //info product
            $product = Product::find($request->product_id);
            if(empty($cart) || $cart->status != Transaction::NOT_SUMMIT)
            {
                //create card
                $cart = new Transaction();
                $cart->status = Transaction::NOT_SUMMIT;
                $cart->user_id = Auth::user()->id;
                $cart->save();
                
                //create order
                
                $order = new Order();
                $order->transaction_id = $cart->id;
                $order->product_id = $request->product_id;
                $order->qty = Order::DEFAULT_QTY;
                $order->amount = Order::DEFAULT_QTY * $product->price;
                $order->save();

                $cart->amount = $cart->amount + $order->amount;
                $cart->save();

                return "Add to cart successfully!";
            } else {

                $order = Order::where('transaction_id', $cart->id)
                                ->where('product_id', $request->product_id)
                                ->first();

                if(!empty($order))
                {
                    $order->qty = $order->qty + 1;
                    $order->amount = $order->qty * $product->price;
                    $order->save();

                    $cart->amount = $cart->amout + $product->price;
                    $cart->save();
                } else {

                    $order = new Order();
                    $order->transaction_id = $cart->id;
                    $order->product_id = $request->product_id;
                    $order->qty = Order::DEFAULT_QTY;
                    $order->amount = Order::DEFAULT_QTY * $product->price;
                    $order->save();

                    $cart->amount = $cart->amount + $product->price;
                    $cart->save();
                }

                return "SUCCESS";
            }
        }
    }

    public function updateCart(Request $request, $cart_id)
    {
        $products = $request->products;
        $sum = 0;
        foreach ($products as $key => $product) {
            $objProduct = Product::find($product['product_id']);
            $sum = $products[$key]['amount'] = $objProduct->price * $product['qty'];
        }
        $cart = Transaction::find($cart_id);
        if($cart)
        {
            foreach ($products as $product) {
                Order::where('transaction_id', $cart->id)
                    ->where('product_id', $product['product_id'])
                    ->update([
                        'qty' => $product['qty'],
                        'amount' => $product['amount']
                ]);
            }
            $cart->amount = $sum;
            $cart->status = $request->status;
            $cart->save();

            return redirect()->back()->withStatus(['message' => 'Update cart successfully!']);
        } else {
            return redirect()->back()->withStatus(['message' => 'Update cart fail!']);
        }
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

    public function deleteOrder($order_id)
    {

        $order = Order::where('id', $order_id)->first();
        $order->delete();
        $cart = Transaction::where('id', $order->transaction_id)->first();
        $orders = $cart->order;
        $sum = 0;
        foreach ($orders as $order) {
            $sum += $order->amount;
        }
        $cart->amount = $sum;
        $cart->save();

        return redirect()->back()->withStatus(['message' => 'Update successfully!']);

    }
}
