<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\ProductsModel;
use Lang;

class ProductsController extends Controller
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
     $categores = $productsModel->getCategories();
     if ($request->category != null) {
         $categoryName = $productsModel->getCategoryName($request->category);
   }
   function buildTree(array $elements, $parentId = 0)
   {
     $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parentId) {
                $children = buildTree($elements, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
   }
   $tree = buildTree($categores);
     return view('publics.products', [
         'products' => $products,
         'cartProducts' => $this->products,
         'categories' => $tree,
         'selectedCategory' => $request->category,
         'head_title' => $request->category == null ? Lang::get('seo.title_products') : $categoryName[0],
         'head_description' => $request->category == null ? Lang::get('soe.descr_products') : Lang::get('seo.descr_products_category') . $categoryName[0],
     ]);
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
public function productPreview(Request $request)
   {
     $productsModel = new ProductsModel();
     $product = $productsModel->getProduct($request->id);
     if ($product == null) {
         abort(404);
     }
     $gallery = array();
     if ($product->folder != null) {
         $dir = '../storage/app/public/moreImagesFolders/' . $product->folder . '/';
         if (is_dir($dir)) {
             if ($dh = opendir($dir)) {
                 $i = 0;
                 while (($file = readdir($dh)) !== false) {
                     if (is_file($dir . $file)) {
                         $gallery[] = asset('storage/moreImagesFolders/' . $product->folder . '/' . $file);
                     }
                     $i++;
                 }
                 closedir($dh);
             }
           }
       }
       return view('publics.preview', [
         'product' => $product,
        'cartProducts' => $this->products,
        'head_title' => mb_strlen($product->name) > 70 ? str_limit($product->name, 70) : $product->name,
        'head_description' => mb_strlen($product->description) > 160 ? str_limit($product->description, 160) : $product->description,
        'gallery' => $gallery
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
