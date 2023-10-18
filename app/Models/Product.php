<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'photo',
        'category_id',
    ];

    protected function photo(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                if (Str::contains($value, 'https')) {
                    return $value;
                }

                return asset('storage/' . $value);
            },
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
