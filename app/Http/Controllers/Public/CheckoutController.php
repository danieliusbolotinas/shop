<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\CheckoutModel;
use Lang;
use App\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('publics.checkout', [
            'cartProducts' => $this->products,
            'head_title' => Lang::get('seo.title_checkout'),
            'head_description' => Lang::get('soe.descr_checkout')
        ]);
    }

    public function setOrder(Request $request)
       {
           $post = $request->all();
           $checkoutModel = new CheckoutModel();
           $checkoutModel->setOrder($post);
           $cart = new Cart();
           $cart->clearCart();
           return redirect(lang_url('/'))->with(['msg' => Lang::get('public_pages.order_accepted'), 'result' => true]);
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

    public function setFastOrder(Request $request)
        {
            $post = $request->all();
            $checkoutModel = new CheckoutModel();
            $checkoutModel->setFastOrder($post);
            return redirect(lang_url('/'))->with(['msg' => Lang::get('public_pages.order_accepted'), 'result' => true]);
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
    public function update(Request $request, $id)
    {
        //
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
}
