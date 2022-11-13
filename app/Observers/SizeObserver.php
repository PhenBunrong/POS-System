<?php

namespace App\Observers;

use App\Models\Size;

class SizeObserver
{
    public function creating(Size $item)
    {
        $item->slug = \Str::slug($item->name);
        
    }
    /**
     * Handle the Size "created" event.
     *
     * @param  \App\Models\Size  $size
     * @return void
     */
    public function created(Size $size)
    {
        $size->creator = \Auth::guard(backpack_guard_name())->user()->id;
        $size->save();
    }

    /**
     * Handle the Size "updated" event.
     *
     * @param  \App\Models\Size  $size
     * @return void
     */
    public function updated(Size $size)
    {
        //
    }

    /**
     * Handle the Size "deleted" event.
     *
     * @param  \App\Models\Size  $size
     * @return void
     */
    public function deleted(Size $size)
    {
        //
    }

    /**
     * Handle the Size "restored" event.
     *
     * @param  \App\Models\Size  $size
     * @return void
     */
    public function restored(Size $size)
    {
        //
    }

    /**
     * Handle the Size "force deleted" event.
     *
     * @param  \App\Models\Size  $size
     * @return void
     */
    public function forceDeleted(Size $size)
    {
        //
    }
}
