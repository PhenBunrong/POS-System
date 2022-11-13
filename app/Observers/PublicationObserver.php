<?php

namespace App\Observers;

use App\Models\Publication;

class PublicationObserver
{
    public function creating(Publication $item)
    {
        $item->slug = \Str::slug($item->name);
        
    }
    /**
     * Handle the Publication "created" event.
     *
     * @param  \App\Models\Publication  $Publication
     * @return void
     */
    public function created(Publication $item)
    {
        $item->creator = \Auth::guard(backpack_guard_name())->user()->id;
        $item->save();
    }

    /**
     * Handle the Publication "updated" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function updated(Publication $publication)
    {
        //
    }

    /**
     * Handle the Publication "deleted" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function deleted(Publication $publication)
    {
        //
    }

    /**
     * Handle the Publication "restored" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function restored(Publication $publication)
    {
        //
    }

    /**
     * Handle the Publication "force deleted" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function forceDeleted(Publication $publication)
    {
        //
    }
}
