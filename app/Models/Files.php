<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Files extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'url', 'type', 'mime_type' ,'fileable_id', 'fileable_type',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }
}
