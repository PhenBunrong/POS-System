<?php

namespace App\Observers;

use App\Models\MainCategory;
use Illuminate\Support\Facades\Auth;

class MainCategoryObserver
{
    public function creating(MainCategory $item)
    {
        $item->slug = \Str::slug($item->name);
        
    }
    /**
     * Handle the MainCategory "created" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function created(MainCategory $mainCategory)
    {
        $mainCategory->creator = \Auth::guard(backpack_guard_name())->user()->id;
        $mainCategory->save();
    }

    /**
     * Handle the MainCategory "updated" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function updated(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Handle the MainCategory "deleted" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function deleted(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Handle the MainCategory "restored" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function restored(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Handle the MainCategory "force deleted" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function forceDeleted(MainCategory $mainCategory)
    {
        //
    }
}
