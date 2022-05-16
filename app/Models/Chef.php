<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $table='chefs';

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
}
