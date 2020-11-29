<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'post_title','post_content','post_status','post_desc','post_image','cate_post_id'
    ];
    protected $primaryKey='post_id';
    protected $table='tbl_post';
    function cate_post() {
        return $this->belongsTo('App\CatePost','cate_post_id');
      }
}
