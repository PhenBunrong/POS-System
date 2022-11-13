<?php

namespace App\Observers;

use App\Models\Unit;

class UnitObserver
{
    public function creating(Unit $item)
    {
        $item->slug = \Str::slug($item->name);
        
    }
    /**
     * Handle the Unit "created" event.
     *
     * @param  \App\Models\Unit  $Unit
     * @return void
     */
    public function created(Unit $item)
    {
        $item->creator = \Auth::guard(backpack_guard_name())->user()->id;
        $item->save();
    }

    /**
     * Handle the Unit "updated" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function updated(Unit $unit)
    {
        //
    }

    /**
     * Handle the Unit "deleted" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function deleted(Unit $unit)
    {
        //
    }

    /**
     * Handle the Unit "restored" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function restored(Unit $unit)
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function forceDeleted(Unit $unit)
    {
        //
    }
}
