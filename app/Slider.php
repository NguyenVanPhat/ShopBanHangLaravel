<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'slider_name', 'slider_status', 'slider_desc','slider_image'
    ];
    protected $primaryKey = 'slider_id';
 	protected $table = 'tbl_slider';
}
