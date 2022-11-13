<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CustomerExport;
use App\Models\Customer;
use App\Imports\CustomersImport;
use App\Repositories\CompanRepo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    protected $companRepo; // cunstuctor for protected value null
    private $excel;

    // public function __construct(Excel $excel)
    // {
    //     $this->excel = $excel;
    // }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer');
        CRUD::setEntityNameStrings('customer', 'customers');
        $this->companRepo = resolve(CompanRepo::class);
        $this->excel = resolve(Excel::class);
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->addButtonFromView('top', 'customerImport', 'customerImport', 'end');
        $this->crud->addButtonFromView('top', 'customerExport', 'customerExport', 'end');
        $this->crud->enableExportButtons();
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('address');
        CRUD::column('gender');
        CRUD::column('phone');
        CRUD::column('status');
        CRUD::column('created_at');
        CRUD::column('updated_at');

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
        CRUD::setValidation(CustomerRequest::class);

        $colMd6 = ['class' => 'form-group col-md-6'];

        CRUD::addField([
            'name' => 'name', 
            'type' => 'text',
            'wrapper' => $colMd6,
            'tab'     => 'Customer Form',
        ]);
        CRUD::addField([
            'name' => 'email', 
            'type' => 'email',
            'wrapper' => $colMd6,
            'tab'     => 'Customer Form',
        ]);
        $this->crud->addField([
            'name'  => 'created_at',
            'type'  => 'date_picker',
            'label' => 'Valid From',
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy',
                'language' => 'en'
            ],
            'wrapper'   => [
                'class'      => 'col-md-6'
            ],
        ]);
        CRUD::addField([
            'name' => 'address', 
            'type' => 'text',
            'wrapper' => $colMd6,
            'tab'     => 'Customer Form',
        ]);
        CRUD::addField([   // select_from_array
            'name'        => 'gender',
            'label'       => "Gender",
            'type'        => 'select_from_array',
            'wrapper' => $colMd6,
            'tab'     => 'Customer Form',
            'options'     => [
                0 => 'Male',
                1 => 'Female'
            ],
            'allows_null' => false,
            'default'     => 1,
            
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ],
        ); 
        CRUD::addField([
            'name' => 'phone', 
            'type' => 'intl-tel-input',
            'view_namespace' => 'mikeybelike.intl-tel-input-backpack::fields',

            // additional optional configuration supported
            'options' => [
                'initialCountry' => 'gb'
            ],
            'wrapper' => $colMd6,
            'tab'     => 'Customer Form',
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
            'tab'     => 'Customer Form',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ],); 

        $this->crud->addField(
            [    
                'label' => "company",
                'name' => "companiess",
                'type' => 'flexi.company',
                'wrapper'  => $colMd6,
                'tab'      => 'Company Form',
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

        $response = $this->traitStore();
        $this->companRepo->createOrUpdateRepo($this->crud->entry , $this->crud->getRequest());
        return $response;
    }

    protected function destroy($id)
    {
        // $this->crud->hasAccessOrFail('delete');
        $entry = $this->crud->getEntry($id);
        optional($entry->companiess)->delete();
        $data = $entry->delete();
        return $data;
    }
    protected function update($id)
    {
        $response = $this->traitUpdate();

        $this->companRepo->createOrUpdateRepo($this->crud->entry , $this->crud->getRequest());
        return $response;

    }

    public function import() 
    {
        dd(232);
        Excel::import(new CustomersImport, request()->file);
        return response()->json([request()->file]);
    }



    public function export()
    {
        dd(23);
        return $this->excel->download(new CustomerExport, 'customers.csv', Excel::CSV);
        // return Excel::download(new CustomerExport, 'customers.xlsx');
    }

    // $this->crud->$entry == update for have data
    // $this->crud->getRequest() = insert for don't have data

}
