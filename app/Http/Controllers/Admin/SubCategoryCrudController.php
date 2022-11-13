<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubCategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SubCategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SubCategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;
    
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\SubCategory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sub-category');
        CRUD::setEntityNameStrings('sub category', 'sub categories');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        //main category
        CRUD::addColumn(
            [
                // any type of relationship
                'name'         => 'mainCategory', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Main Category', // Table column heading
            ]
        );
        //category
        CRUD::addColumn(
            [
                // any type of relationship
                'name'         => 'cateogories', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Category', // Table column heading
            ]
        );
        CRUD::column('name');
        //image
        CRUD::addColumn(
            [
                'name'      => 'image', // The db column name
                'label'     => 'icon', // Table column heading
                'type'      => 'closure',
                'function' => function($entry){
                    return '<a href="'.asset($entry->image).'" data-lightbox="image-1" data-title="My caption"><img src="'.asset($entry->image).'" style="width:45px"></a>';
                }
            ],
        );
        CRUD::column('creator');
        CRUD::column('slug');
        CRUD::column('status');
        // CRUD::column('created_at');
        // CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SubCategoryRequest::class);

        $this->crud->addField(
            [    // Select2Multiple = n-n relationship (with pivot table)
                'type'  =>  'select2',
                'name'  => 'mainCategory', // the method that defines the relationship in your Model
                //optional
                'entity' => 'mainCategory', // the method that defines the relationship in your Model
                'model'  => "App\Models\MainCategory", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                // 'pivot'     => true // on create&update, do you need to add/delete pivot table entries?
            ],
        );
        $this->crud->addField(
            [    // Select2Multiple = n-n relationship (with pivot table)
                'type'  =>  'select2',
                'name'  => 'cateogories', // the method that defines the relationship in your Model
                //optional
                'entity' => 'cateogories', // the method that defines the relationship in your Model
                'model'  => "App\Models\Category", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                // 'pivot'     => true // on create&update, do you need to add/delete pivot table entries?
            ],
        );
        CRUD::field('name');
        //image
        $this->crud->addField([
            'label' => "Icon",
            'name' => "image",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        //status
        CRUD::addField([   // select_from_array
            'name'        => 'status',
            'label'       => "Status",
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Draft',
                1 => 'Published'
            ],
            'allows_null' => false,
            'default'     => 1,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ],);
 

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
