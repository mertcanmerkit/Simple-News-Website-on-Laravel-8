<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['id','commenter_id','news_id','content','status','created_at','updated_at'];


    public function user(){
        return $this->belongsTo('App\Models\User','commenter_id');
    }
}
