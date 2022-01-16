<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsContent extends Model
{
    use HasFactory;
    protected $fillable = ['img_src','title','description','status'];

    public function comments(){
        return $this->hasMany('App\Models\Comment','news_id');
    }
}
