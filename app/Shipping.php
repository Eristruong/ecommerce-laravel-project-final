<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'bill_id',
        'order_code',
        'trans_type',
        'total_fee',
        'expected_delivery_time',
    ];

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'shippings';

    // Relationship với model Bill (để sử dụng các phương thức như 'belongsTo')
    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }
}
