<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array(
        'name','comment','productID','user_id'
    );


    public function replies(){
    	return $this->hasMany('App\Reply');
    }
}
