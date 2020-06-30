<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable=[
        'title',
        'cat_id',
        'summary',
        'details',
        'bublish',
        'image'
    ];

    public function category(){
        //Model Name         //FK Name    //PK Name
        //return $this->belongsTo('App\Models\Category','category_id','id');
        return $this->belongsTo('App\Models\Category' , 'cat_id','id');
    }
}
