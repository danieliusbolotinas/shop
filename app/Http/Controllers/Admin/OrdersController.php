<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lang;
use App\Models\Admin\OrdersModel;
use App\Models\Publics\ProductsModel;

class OrdersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $ordersModel = new OrdersModel();
    $orders = $ordersModel->getOrders();
    $fastOrders = $ordersModel->getFastOrders();
    return view('admin.orders', [
        'page_title_lang' => Lang::get('admin_pages.orders'),
        'orders' => $orders,
        'fastOrders' => $fastOrders,
        'controller' => $this
    ]);
  }

  public function changeStatus(Request $request)
     {
         if (!$request->ajax()) {
             abort(404);
         }
         $post = $request->all();
         $ordersModel = new OrdersModel();
         $ordersModel->setNewStatus($post);
     }
     public function getProductInfo($id)
     {
         $productsModel = new ProductsModel();
         $product = $productsModel->getProduct($id);
         return $product;
     }
     public function markFastOrder(Request $request)
     {
         if (isset($request->id) && (int) $request->id > 0) {
             $ordersModel = new OrdersModel();
             $ordersModel->setFastOrderAsViewed($request->id);
             return redirect(lang_url('admin/orders'))->with(['msg' => Lang::get('admin_pages.fast_order_marked'), 'result' => true]);
         } else {
             abort(404);
         }
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
  public function destroy($id)
  {
      //
  }
}
