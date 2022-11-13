<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CompanyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CompanyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Company::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/company');
        CRUD::setEntityNameStrings('company', 'companies');
        $this->crud->denyAccess(['show','update','delete']);

    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // $this->crud->removeButton('show');
        

        // CRUD::column('id');
        $this->crud->addColumn([
            'label' => 'Customer',
            'type' => 'relationship',
            'name' => 'customerStr',
            'entity' => 'customerStr',
            'attribute' => 'name'
        ]);
        CRUD::column('company_name');
        CRUD::column('company_address');
        CRUD::column('company_phone');
        CRUD::AddColumn([
            'label' => 'Date',
            'name'  => 'created_at',
            'type'  =>  'date',
            'format'=> 'DD-MMM-Y'
        ]);
        CRUD::AddColumn([
            'label' => 'Date',
            'name'  => 'updated_at',
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
        CRUD::setValidation(CompanyRequest::class);

        
        // CRUD::field('company_name');
        // CRUD::field('address');
        // CRUD::field('phone');

        CRUD::addField(
            [   // repeatable
                'name'  => 'repeatable_form',
                'label' => 'Company Form',
                'type'  => 'repeatable',
                'fields' => [
                    [
                        'name'    => 'company_name',
                        'type'    => 'text',
                        'label'   => 'Company Name',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                    [
                        'name'    => 'company_address',
                        'type'    => 'text',
                        'label'   => 'Address',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                    [
                        'name'    => 'company_phone',
                        'type'    => 'text',
                        'label'   => 'Phone',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                ],
            
                // optional
                'new_item_label'  => 'Add Items', // customize the text of the button
                // 'init_rows' => 2, // number of empty rows to be initialized, by default 1
                // 'min_rows' => 2, // minimum rows allowed, when reached the "delete" buttons will be hidden
                // 'max_rows' => 2, // maximum rows allowed, when reached the "new item" button will be hidden
            
            ],
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

    protected function store(){
        $formData = json_decode(request()->repeatable_form);

            // for ($i = $formData; $i > 1 ; $i--){
                foreach($formData as $item){
                    // dd($item);
                    // if($index )
                    Company::create([
                        'id' => $this->crud->entry->id,
                        'company_name' => $item->company_name,
                        'address' => $item->address,
                        'phone' => $item->phone,
                    ]);
                }
            // };
        // dd($formData);
        $response = $this->traitStore();
        return $response;
    }
}
