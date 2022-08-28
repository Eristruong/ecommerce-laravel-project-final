<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';
    protected $primaryKey = 'id';
    protected $fillable = ['bill_id','productID','quantily','price'];
}
