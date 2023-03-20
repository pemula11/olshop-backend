<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'photo', 'is_default'
    ];

    protected $hidden = [

    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
    public function getPhotoAttribute($value)
    {
        return url('storage/'.$value);
    }
    protected function Photo(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) =>  url('storage/'.$value),
        );
    }
}
