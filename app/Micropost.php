<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable =['content'];
    
    // この投稿を所有するユーザ（Userモデルとの関係を定義)
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この投稿をお気に入りに追加したユーザ。
     */
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }

    /**
     * この投稿に関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount(['favorite_users']);
    }
    
    
}
