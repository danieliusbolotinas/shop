<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;

class CartController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

 private $cart;
public function __construct()
{
   $this->cart = new Cart();
}

public function addProduct(Request $request)
{
 if (!$request->ajax()) {
       abort(404);
   }
   $post = $request->all();
   $quantity = (int) $post['quantity'];
   if ($quantity == 0) {
       $quantity = 1;
   }
   $this->cart->addProduct($post['id'], $quantity);
}

public function renderCartProductsWithHtml(Request $request)
{
 if (!$request->ajax()) {
        abort(404);
    }
    echo json_encode(array(
        'html' => $this->cart->getCartHtmlWithProducts(),
        'num_products' => $this->cart->countProducts
    ));
}

public function removeProductQuantity(Request $request)
{
 if (!$request->ajax()) {
       abort(404);
   }
   $post = $request->all();
   $this->cart->removeProductQuantity($post['id']);
}

public function getProductsForCheckoutPage(Request $request)
{
 if (!$request->ajax()) {
        abort(404);
    }
    echo $this->cart->getCartHtmlWithProductsForCheckoutPage();
}
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
 public function removeProduct(Request $request)
   {
     if (!$request->ajax()) {
         abort(404);
     }
     $post = $request->all();
     $this->cart->removeProduct($post['id']);
   }
}
