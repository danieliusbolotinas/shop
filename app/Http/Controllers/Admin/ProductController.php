<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductsModel;
use Lang;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $productsModel = new ProductsModel();
   $products = $productsModel->getProducts($request);
   return view('admin.products', [
       'page_title_lang' => Lang::get('admin_pages.products_list'),
       'products' => $products
   ]);
  }

  public function deleteProduct(Request $request)
      {
          if (isset($request->number) && (int) $request->number > 0) {
              $productsModel = new ProductsModel();
              $productsModel->deleteProduct($request->number);
              return redirect(lang_url('admin/products'))->with(['msg' => Lang::get('admin_pages.product_is_deleted'), 'result' => true]);
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
