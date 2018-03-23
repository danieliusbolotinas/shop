<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\ProductsModel;
use App\Models\Publics\HomeModel;
use Lang;

class HomeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $productsModel = new ProductsModel();
     $homeModel = new HomeModel();
     $promoProducts = $productsModel->getProductsWithTags(['promo']);
     $mostSelledProducts = $productsModel->getMostSelledProducts();
     $carousel = $homeModel->getCarouselSliders();
     return view('publics.home', [
         'promoProducts' => $promoProducts,
         'mostSelledProducts' => $mostSelledProducts,
         'carousel' => $carousel,
         'cartProducts' => $this->products,
         'head_title' => Lang::get('seo.title_home'),
         'head_description' => Lang::get('seo.descr_home')
     ]);
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
