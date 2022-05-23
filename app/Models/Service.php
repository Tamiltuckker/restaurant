<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory,Uuids;
    protected $table='services';

    public function image()
     {
         return $this->morphOne(Attachment::class, 'attachmentable');
     }

     
}
