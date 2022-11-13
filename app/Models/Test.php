<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;
    use CrudTrait;

    
    protected $table = 'test';
    protected $fillable = ['first_name','last_name'];

    public function test()
    {
        return $this->hasMany(Testrepeattable::class,'repeat_id','id');
    }
}
