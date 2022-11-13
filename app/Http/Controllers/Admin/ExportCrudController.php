<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PurchaseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ExportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ExportCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Purchase::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/purchase/export');
        CRUD::setEntityNameStrings('export', 'exports');
        // $this->crud->addButtonFromView('top', 'createClone2', 'createClone2', 'beginning');
        $this->crud->denyAccess(['create']);
        $this->crud->denyAccess(['update','delete']);
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->enableExportButtons();
        // daterange filter
        $this->crud->addFilter([
            'type'  => 'date_range',
            'name'  => 'from_to',
            'label' => 'Date range'
        ],
        false,
        function ($value) { // if the filter is active, apply these constraints
            $dates = json_decode($value);
            $this->crud->addClause('where', 'created_at', '>=', $dates->from);
            $this->crud->addClause('where', 'created_at', '<=', $dates->to . ' 23:59:59');
        });
        CRUD::column('id');
        CRUD::AddColumn([
            'label' => 'Date Create',
            'name'  => 'created_at',
            'type'  =>  'date',
            'format'=> 'DD-MMM-Y'
        ]);
        CRUD::addColumn(['label' => 'Supplier', 'name' => 'supplier_id']);
        CRUD::addColumn(['label' => 'Product', 'name' => 'product_id']);
        CRUD::addColumn(['label' => 'Cost', 'name' => 'cost']);
        CRUD::addColumn(['label' => 'Price', 'name' => 'price']);
        CRUD::addColumn(['label' => 'Qauntity', 'name' => 'qty']);
        CRUD::column('creator');
        


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
        CRUD::setValidation(PurchaseRequest::class);

        CRUD::addField(
            [    // Select2Multiple = n-n relationship (with pivot table)
                'lable' => 'Select Product',
                'type'  =>  'select2',
                'name'  => 'product', // the method that defines the relationship in your Model
                //optional
                'entity' => 'product', // the method that defines the relationship in your Model
                'model'  => "App\Models\Product", // foreign key model
                'attribute' => 'name',
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        );
        CRUD::addField(
            [  
                'name'  => 'cost',
                'label' => 'Cost',
                'type'  => 'number',
                'attributes' => [
                    'placeholder'=>'Enter cost',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        );
        CRUD::addField(
            [  
                'name'  => 'price',
                'label' => 'Price',
                'type'  => 'number',
                'attributes' => [
                    'placeholder'=>'Enter price',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        );
        CRUD::addField(
            [  
                'name'  => 'qty',
                'label' => 'Qty',
                'type'  => 'number',
                'attributes' => [
                    'placeholder'=>'Enter qty',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        );

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
