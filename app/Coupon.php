<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'coupon_name', 'coupon_code','coupon_qty','coupon_money','coupon_condition'
    ];
    protected $primaryKey='coupon_id';
    protected $table='tbl_coupon';
}
