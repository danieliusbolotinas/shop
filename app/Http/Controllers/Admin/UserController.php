<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\UsersModel;
use Lang;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $userInfo = null;
       $usersModel = new UsersModel();
       $users = $usersModel->getUsers();
       $edit = $request->input('edit');
       if ($edit != null) {
           $userInfo = $usersModel->getOneUser($edit);
           if ($userInfo == null) {
               abort(404);
           }
       }
       return view('admin.users', [
           'page_title_lang' => Lang::get('admin_pages.users'),
           'users' => $users,
           'userInfo' => $userInfo
       ]);
    }

    public function setUser(Request $request)
       {
         $edit = $request->input('edit');
    $usersModel = new UsersModel();
    if ($edit > 0) {
        $usersModel->updateUser($request->all());
        $msg = Lang::get('admin_pages.user_is_updated');
    } else {
        $usersModel->setUser($request->all());
        $msg = Lang::get('admin_pages.user_is_added');
    }
    return redirect(lang_url('admin/users'))->with(['msg' => $msg, 'result' => true]);
       }

       public function deleteUser(Request $request)
       {
         if (isset($request->userId) && (int) $request->userId > 0) {
        $usersModel = new UsersModel();
        $usersModel->deleteUser($request->userId);
        return redirect(lang_url('admin/users'))->with(['msg' => Lang::get('admin_pages.user_is_deleted'), 'result' => true]);
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
    public function logout()
   {
     Auth::logout();
   return redirect('/');
   }

}
