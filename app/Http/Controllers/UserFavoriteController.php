<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    /**
     * 投稿をお気に入りに追加するアクション。
     *
     * @param  $micropost_id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function store($micropost_id)
    {
        // 認証済みユーザ（閲覧者）が、$micropost_idの投稿をお気に入りに追加する
        \Auth::user()->favorite($micropost_id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    /**
     * 投稿をお気に入りから解除するアクション。
     *
     * @param  $micropost_id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function destroy($micropost_id)
    {
        // 認証済みユーザ（閲覧者）が、$micropost_idの投稿をお気に入りから解除する
        \Auth::user()->unfavorite($micropost_id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
