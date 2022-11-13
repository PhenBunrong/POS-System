<?php

namespace App\Providers;

use App\Models\Size;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Status;
use App\Models\Writer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Publication;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Observers\SizeObserver;
use App\Observers\UnitObserver;
use App\Observers\BrandObserver;
use App\Observers\ColorObserver;
use App\Observers\StatusObserver;
use App\Observers\WriterObserver;
use App\Observers\ProductObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\Facades\Event;
use App\Observers\PublicationObserver;
use App\Observers\SubCategoryObserver;
use Illuminate\Auth\Events\Registered;
use App\Observers\MainCategoryObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Brand::observe(BrandObserver::class);
        MainCategory::observe(MainCategoryObserver::class);
        Category::observe(CategoryObserver::class);
        SubCategory::observe(SubCategoryObserver::class);
        Color::observe(ColorObserver::class);
        Size::observe(SizeObserver::class);
        Unit::observe(UnitObserver::class);
        Status::observe(StatusObserver::class);
        Writer::observe(WriterObserver::class);
        Publication::observe(PublicationObserver::class);
        Product::observe(ProductObserver::class);
    }
}
