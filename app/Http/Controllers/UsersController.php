<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ユーザー一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(1);
        
        // ユーザー一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でユーザーを検索して取得
        $user = User::findorFail($id);
        
        // ユーザー詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,    
        ]);
    }

}
