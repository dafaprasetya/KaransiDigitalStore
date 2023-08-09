<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'tujuan',
        'harga',
        'status',
        'tr_id',
    ];
}
