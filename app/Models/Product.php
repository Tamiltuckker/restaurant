<?php

namespace App\Models;

use Freshbitsweb\LaravelCartManager\Traits\Cartable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Cartable;
    use HasFactory;
    protected $table='products';

    public function image()
    {
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
    public function Category()
    {
    	return $this->belongsTo(Category::class);
 
   
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
