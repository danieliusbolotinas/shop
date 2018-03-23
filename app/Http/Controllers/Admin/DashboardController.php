  <?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Lang;
  use App\Models\Admin\OrdersModel;

  class DashboardController extends Controller
  {
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
        $oredersModel = new OrdersModel();
         $ordersByMonth = $oredersModel->getOrdersByMonth();
         return view('admin.dashboard', [
             'page_title_lang' => Lang::get('admin_pages.dashboard'),
             'ordersByMonth' => $ordersByMonth
         ]);
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
