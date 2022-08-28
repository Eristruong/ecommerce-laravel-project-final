<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'productID';
    protected $fillable = ['productID','categoryID','productName','productImage','listPrice','discountPercent','description'];
}
