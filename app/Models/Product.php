<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    public function image()
    {
        // return $this->morphTo(Attachment::class,'attachmentable_id','attachmentable_type');
        return $this->morphOne(Attachment::class, 'attachmentable');

    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product');
    }
}
