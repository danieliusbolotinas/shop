  <?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use App\Models\Admin\CategoriesModel;
  use Lang;
  use Config;

  class ProductCategoryController extends Controller
  {
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index(Request $reques)
      {
        $category = null;
          $edit = $request->input('edit');
          $categoriesModel = new CategoriesModel();
          if ($edit != null) {
              $category = $categoriesModel->getOneCategory($edit);
              if ($category['category'] == null) {
                  abort(404);
              }
        }
        $categories = $categoriesModel->getCategoriesWithPagination($request);
        $allCategories = $categoriesModel->getAllCategories();
        return view('admin.categories', [
            'page_title_lang' => Lang::get('admin_pages.categories'),
            'locales' => Config::get('app.locales'),
            'currentLocale' => app()->getLocale(),
            'category' => $category,
            'categories' => $categories,
            'allCategories' => $allCategories
        ]);
      }

      public function setCategory(Request $request)
          {
            $edit = $request->input('edit');
                   $categoriesModel = new CategoriesModel();
                   if ($edit != null && $edit > 0) {
                       $result = $categoriesModel->updateCategory($request->all(), $edit);
                   } else {
                       $result = $categoriesModel->setCategory($request->all());
                   }
                   return redirect(lang_url('admin/categories'))->with(['msg' => $result['msg'], 'result' => $result['result']]);
          }

          public function deleteCategories(Request $request)
          {
            $ids = $request->input('ids');
      if ($ids == null) {
          abort(404);
      }
      $categoriesModel = new CategoriesModel();
      $categoriesModel->deleteCategories($ids);
      return redirect(lang_url('admin/categories'))->with(['msg' => Lang::get('admin_pages.selected_categ_deleted'), 'result' => true]);
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
