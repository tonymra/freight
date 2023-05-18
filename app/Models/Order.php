<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'bl_release_date',
        'bl_release_user_id',
        'freight_payer_self',
        'contract_number',
        'bl_number'
    ];

    protected $casts = [
        'bl_release_date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class,'bl_release_user_id');
    }
}
