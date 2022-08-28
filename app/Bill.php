<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'bill_id';
    protected $fillable = ['bill_id','customerID','date_order','total','note','status','payment','codevnpay'];
}
