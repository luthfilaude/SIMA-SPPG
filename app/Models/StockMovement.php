<?php

namespace App\Models;

use App\Models\User;
use App\Models\StockItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_item_id',
        'user_id',
        'movement_type',
        'quantity',
        'remarks',
    ];

    public function stockItem(){
        return $this->belongsTo(StockItem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
