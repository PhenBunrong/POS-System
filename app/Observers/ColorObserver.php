<?php

namespace App\Observers;

use App\Models\Color;

class ColorObserver
{
    public function creating(Color $color)
    {
        $color->slug = \Str::slug($color->name);
        
    }
    /**
     * Handle the Color "created" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function created(Color $color)
    {
        $color->creator = \Auth::guard(backpack_guard_name())->user()->id;
        $color->save();
    }

    /**
     * Handle the Color "updated" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function updated(Color $color)
    {
        //
    }

    /**
     * Handle the Color "deleted" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function deleted(Color $color)
    {
        //
    }

    /**
     * Handle the Color "restored" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function restored(Color $color)
    {
        //
    }

    /**
     * Handle the Color "force deleted" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function forceDeleted(Color $color)
    {
        //
    }
}
