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
        'photo',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function deleteOldRecord()
    {
        $oldRecord = $this->where('id', '<>', $this->id)->first();
        if ($oldRecord) {
            $oldRecord->delete();
        }
    }

}
