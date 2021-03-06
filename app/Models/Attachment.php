<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $table='attachments';

    protected $fillable = ['attachmentable_id', 'attachmentable_type', 'attachmentable_image'];

    public function attachmentable()
    {
        return $this->morphTo(Attachment::class,'attachmentable_id','attachmentable_type');
    }
}
