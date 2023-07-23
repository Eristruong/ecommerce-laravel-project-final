<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['idProvince', 'idDistrict', 'wardCode', 'WardName'];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'IdAddress', 'id');
    }

}
