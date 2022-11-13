<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PurchaseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PurchaseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PurchaseCrudController extends CrudController
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
        CRUD::setRoute(config('backpack.base.route_prefix') . '/purchase');
        CRUD::setEntityNameStrings('purchase', 'purchases');
        $this->crud->addButtonFromView('top', 'purchasePopUp', 'purchasePopUp', 'beginning');
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
        CRUD::column('id');
        CRUD::column('product_id');
        CRUD::column('cost');
        CRUD::column('price');
        CRUD::column('qty');
        CRUD::column('status');
        CRUD::column('creator');
        CRUD::AddColumn([
            'label' => 'Date Create',
            'name'  => 'created_at',
            'type'  =>  'date',
            'format'=> 'DD-MMM-Y'
        ]);


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
