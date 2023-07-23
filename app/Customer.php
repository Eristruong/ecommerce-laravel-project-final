<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['userID','name','email','IdAddress','phone_number','note'];


    public function address()
    {
        return $this->belongsTo(Address::class, 'IdAddress', 'id');
    }
}
