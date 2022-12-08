<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'step_name',
        'step_desc',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
