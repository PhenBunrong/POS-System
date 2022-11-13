<?php

namespace App\Observers;

use App\Models\Writer;

class WriterObserver
{
    public function creating(Writer $item)
    {
        $item->slug = \Str::slug($item->name);
        
    }
    /**
     * Handle the Writer "created" event.
     *
     * @param  \App\Models\Writer  $Writer
     * @return void
     */
    public function created(Writer $item)
    {
        $item->creator = \Auth::guard(backpack_guard_name())->user()->id;
        $item->save();
    }

    /**
     * Handle the Writer "updated" event.
     *
     * @param  \App\Models\Writer  $Writer
     * @return void
     */
    public function updated(Writer $Writer)
    {
        //
    }

    /**
     * Handle the Writer "deleted" event.
     *
     * @param  \App\Models\Writer  $Writer
     * @return void
     */
    public function deleted(Writer $Writer)
    {
        //
    }

    /**
     * Handle the Writer "restored" event.
     *
     * @param  \App\Models\Writer  $Writer
     * @return void
     */
    public function restored(Writer $Writer)
    {
        //
    }

    /**
     * Handle the Writer "force deleted" event.
     *
     * @param  \App\Models\Writer  $Writer
     * @return void
     */
    public function forceDeleted(Writer $Writer)
    {
        //
    }
}
