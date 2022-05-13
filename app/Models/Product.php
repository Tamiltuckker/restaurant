<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function attachment()
    {
        return $this->morphTo(Attachment::class,'attachmentable_id','attachmentable_type');
    }
}
