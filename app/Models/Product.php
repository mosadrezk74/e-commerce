<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
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
        'category_id',
    ];
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function calculateTotalPriceInCart($cartData)
    {
        $totalPrice = 0;

        foreach ($cartData as $id => $quantity) {
            $product = $this->find($id); // Assuming $this represents the Product model
            if ($product) {
                $totalPrice += $product->price * $quantity;
            }
        }

        return $totalPrice;
    }
}
