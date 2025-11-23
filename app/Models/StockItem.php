<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockMovement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'description',
        'stock_image',
        'stock',
        'stock_min',
        'stock_purchase',
        'supplier_id',
        'category_id',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function stockMovement(){
        return $this->belongsTo(StockMovement::class);
    }
}
