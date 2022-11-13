<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Product;

class ProductObserver
{
    public function creating(Product $item)
    {
        $item->slug = \Str::slug($item->name);
    }
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $Product
     * @return void
     */
    public function created(Product $item)
    {
        $item->code = 'PRO-' . Carbon::now()->year . Carbon::now()->month . $item->id . Carbon::now()->day;
        $item->creator = \Auth::guard(backpack_guard_name())->user()->id;
        $item->save();
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $product->slug = \Str::slug($product->name);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
