<?php

namespace App\Models;

use App\Models\Files;
// use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use CrudTrait;
    use SoftDeletes;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    // protected $primaryKey = 'id'
    // public $timestamps = false
    protected $guarded = ['id'];
    // protected $fillable = []
    // protected $hidden = []
    // protected $dates = []
    protected $appends = ['discount_price'];

    public function getDiscountPriceAttribute()
    {
        $today_date = Carbon::now()->format('Y-m-d');
        if($this->expiration_date > $today_date){
            $discount_price = $this->price - ( $this->price * ( $this->discount / 100 ));
            return $this->attributes['discount_price'] = ceil($discount_price);
        }else{
            return 0;
        }
    }
    // $discount = !empty($this->discount) ? $this->discount / 100 : 0

     /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::delete(Str::replaceFirst('storage/','public/', $obj->image));
        });
    }
    
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        // destination path relative to the disk above
        $destination_path = "public/product";
    
        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            Storage::delete($this->{$attribute_name});
    
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }
    
        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);
    
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
    
            // 2. Store the image on disk.
            Storage::put($destination_path.'/'.$filename, $image->stream());
    
            // 3. Delete the previous image, if there was one.
            Storage::delete(Str::replaceFirst('storage/','public/', $this->{$attribute_name}));
    
            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    
    public static function scopeActive($query){
        return $query->where('status',1);
    }
    

    // Relationship all Table

    // public function status()
    // {
    //     return $this->belongsTo('App\Models\Status', 'status', 'serial');
    // }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    public function subCategory()
    {
        return $this->belongsToMany('App\Models\SubCategory')->withTimestamps();
    }

    public function mainCategory()
    {
        return $this->belongsToMany('App\Models\MainCategory')->withTimestamps();
    }

    public function color()
    {
        return $this->belongsToMany('App\Models\Color')->withTimestamps();
    }

    public function publication()
    {
        return $this->belongsToMany('App\Models\Publication')->withTimestamps();
    }

    public function size()
    {
        return $this->belongsToMany('App\Models\Size')->withTimestamps();
    }

    public function unit()
    {
        return $this->belongsToMany('App\Models\Unit')->withTimestamps();
    }

    public function writer()
    {
        return $this->belongsToMany('App\Models\Writer')->withTimestamps();
    }
    public function vendor()
    {
        return $this->belongsToMany('App\Models\Vendor')->withTimestamps();
    }

    // public function image()
    // {
    //     return $this->belongsToMany('App\Models\Image')->withTimestamps()
    // }

    public function file(): \Illuminate\Database\Eloquent\Relations\morphOne
    {
        return $this->morphOne(Files::class, 'fileable')->select(['id', 'url', 'type']);
    }

    public function files()
    {
        return $this->morphMany(Files::class, 'fileable');
    }

    // public function thumbnail_rl(){
    //     return $this->belongsToMany(Image::class, 'image_product','image_id','product_id')
    // }
    
    // public function thumbnail_rl(){
    //     return $this->hasMany(Image::class,'product_id')
    // }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    
    // public function getDiscountAttribute($value)
    // {
    //     return ($value).'%';
    // }
    // give value databese before  
    // public function getPriceAttribute($value) {
    //     // $this->attributes['price'] = $value.' $';
    //     return '$'.($value);
    // }

    public function getStatusStrAttribute() {
        	
        return $this->status == 1 ? 'Active' : 'Inactive';
        // $this->attributes['price'] = ' $';
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    // public function getNameAttribute($key){
    //     $formData = json_decode($key, true);

    //     $this->attributes['phone'] = json_encode($formData);
    // }
}
