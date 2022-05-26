<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table='categories';

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
     
     public function products()
     {
         return $this->hasMany(Product::class);
     }
    

}
