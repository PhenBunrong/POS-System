<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupplierRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SupplierCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SupplierCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(\App\Models\Supplier::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/supplier');
        CRUD::setEntityNameStrings('supplier', 'suppliers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('company_name');
        CRUD::column('ower_name');
        CRUD::column('phone');
        CRUD::column('address');
        CRUD::column('creator');
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
        CRUD::setValidation(SupplierRequest::class);

        $colMd6 = ['class' => 'form-group col-md-6'];

        CRUD::addField([
            'label'=> 'Conpany Name',
            'name' => 'company_name', 
            'type' => 'text',
            'wrapper' => $colMd6,
        ]);
        CRUD::addField([
            'label'=> 'Ower Name',
            'name' => 'ower_name', 
            'type' => 'text',
            'wrapper' => $colMd6,
        ]);
        CRUD::addField([
            'label' =>  'Phone',
            'name' =>  'phone',
            'type' => 'intl-tel-input',
            'view_namespace' => 'mikeybelike.intl-tel-input-backpack::fields',

            // additional optional configuration supported
            'options' => [
                'initialCountry' => 'gb'
            ],
            'wrapper' => $colMd6,
        ]);
        CRUD::addField([
            'label'=> 'Address',
            'name' => 'address', 
            'type' => 'text',
            'wrapper' => $colMd6,
        ]);
        CRUD::addField([
            'label'=> 'Address',
            'name' => 'address', 
            'type' => 'text',
            'wrapper' => $colMd6,
        ]);
        CRUD::addField([   // select_from_array
            'name'        => 'status',
            'label'       => "Status",
            'type'        => 'select_from_array',
            'wrapper' => $colMd6,
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
