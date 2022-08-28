<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'productdetails';
    protected $primaryKey = 'id';
    protected $fillable = ['id','productID','brand','guarantee','productImage1','productImage2','productImage3','description'];
}
