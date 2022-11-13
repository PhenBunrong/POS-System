<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use App\Repositories\EducationRepo;
use BackpackImport\ImportOperation;
use App\Http\Requests\MemberRequest;
use App\Repositories\ExperienceRepo;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MemberCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;
    protected $experienceRepo;
    protected $EducationRepo;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Member::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/member');
        CRUD::setEntityNameStrings('member', 'members');
        $this->experienceRepo = resolve(ExperienceRepo::class);
        $this->EducationRepo = resolve(EducationRepo::class);
         // dropdown filter
       $this->crud->addFilter([
        'name'  => 'status',
        'type'  => 'dropdown',
        'label' => 'Status Display'
            ], [
                0 => 'Inactive',
                1 => 'Active',
            ], function($value) { // if the filter is active
                $this->crud->addClause('where', 'status', $value);
        });

        $this->crud->addFilter([
            'label' =>  'Phone',
            'name'  =>  'phone',
            'type'  =>  'text',
            // 'type' => 'intl-tel-input',
            // 'view_namespace' => 'mikeybelike.intl-tel-input-backpack::fields',
            false,
            function ($value) {
                if($value[0] == "+"){
                    $this->crud->addClause('where','phone','ILIKE', "$value%");
                }else if($value[0] == 0){
                    $searchTerm = str_replace('0', '+855', $value);
                    $this->crud->addClause('where','phone','ILIKE',"$searchTerm%");
                }
            },
        ]);

        // daterange filter
        $this->crud->addFilter([ // daterange filter
            'type' => 'date_range',
            'name' => 'from_to2',
            'label' => 'Date Range',
            'locale' => ['format' => 'DD/MM/YYYY'],
            'date_range_options' => [
                'locale' => ['format' => 'DD/MM/YYYY']
            ]

        ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates = json_decode($value);
                $this->crud->addClause('where', 'created_at', '>=', $dates->from);
                $this->crud->addClause('where', 'created_at', '<=', $dates->to . ' 23:59:59');
            });
    }

   
    // public function importValidationRules()
    // {
    //     return [
    //         'kh_name'        => 'required|max:255',
    //         'en_name'    => 'nullable|numeric',
    //         'code'    => 'nullable|numeric',
    //         'phone'       => 'nullable|numeric',
    //         'profile'       => 'nullable',
    //         'member_type' => 'nullable|max:5000',
    //         'status'      => 'required',
    //     ];
    // }

    protected function setupListOperation()
    {
        
        CRUD::column('id');
        CRUD::column('profile');
        CRUD::column('code');
        CRUD::column('kh_name');
        CRUD::column('en_name');
        CRUD::column('phone');
        CRUD::column('member_type');
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
        CRUD::setValidation(MemberRequest::class);

        $colMd6 = ['class' => 'form-group col-md-6'];

        CRUD::addField([
            'label' =>  'Khmer Name',
            'name'  => 'kh_name', 
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter Kh name',
            ],
            'wrapper' => $colMd6,
            'tab'     => 'Members Profile',
        ]);
        CRUD::addField([
            'label' =>  'English Name',
            'name'  => 'en_name', 
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter En name',
            ],
            'wrapper' => $colMd6,
            'tab'     => 'Members Profile',
        ]);
        CRUD::addField([
            'label' =>  'Code',
            'name'  => 'code', 
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter Code',
            ],
            'wrapper' => $colMd6,
            'tab'     => 'Members Profile',
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
            'tab'     => 'Members Profile',
        ]);
        CRUD::addField([   // select_from_array
            'label' =>  'Member Type',
            'name'        => 'member_type',
            'type'        => 'select_from_array',
            'wrapper' => $colMd6,
            'options'     => [
                0 => 'Qualified Member',
                1 => 'Associals Member',
                2 => 'Entripreneur Member',
                3 => 'Investor Member',
            ],
            'allows_null' => false,
            'default'     => 1,
            'tab'     => 'Members Profile',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ],);
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
            'tab'     => 'Members Profile',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ],);

        CRUD::addField(
            [   // repeatable
                'name'  => 'repeatable_educat',
                'label' => 'Education Form',
                'type'  => 'repeatable',
                'fields' => [
                    [
                        'label' => "Education",
                        'name' => "educatRelation",
                        'type' => 'educatField.educat',
                        'wrapper'  => $colMd6,
                    ]  
                ],
                'tab'     => 'Education',
            
                // optional
                'new_item_label'  => 'Add Items', // customize the text of the button
                // 'init_rows' => 2, // number of empty rows to be initialized, by default 1
                // 'min_rows' => 2, // minimum rows allowed, when reached the "delete" buttons will be hidden
                // 'max_rows' => 2, // maximum rows allowed, when reached the "new item" button will be hidden
            
            ],
        );
        CRUD::addField(
            [   // repeatable
                'name'  => 'repeatable_exper',
                'label' => 'Company Form',
                'type'  => 'repeatable',
                'fields' => [
                    [
                        'label' => "company",
                        'name' => "experRelation",
                        'type' => 'experField.exper',
                        'wrapper'  => $colMd6,
                    ]  
                ],
                'tab'     => 'Experience',
            
                // optional
                'new_item_label'  => 'Add Items', // customize the text of the button
                // 'init_rows' => 2, // number of empty rows to be initialized, by default 1
                // 'min_rows' => 2, // minimum rows allowed, when reached the "delete" buttons will be hidden
                // 'max_rows' => 2, // maximum rows allowed, when reached the "new item" button will be hidden
            
            ],
        );

        // CRUD::addField([ // select_and_order
                //     'name'    => 'select_and_order',
                //     'label'   => 'Select_and_order',
                //     'type'    => 'select_and_order',
                //     'options' => [
                //         1 => 'Option 1',
                //         2 => 'Option 2',
                //         3 => 'Option 3',
                //         4 => 'Option 4',
                //         5 => 'Option 5',
                //         6 => 'Option 6',
                //         7 => 'Option 7',
                //         8 => 'Option 8',
                //         9 => 'Option 9',
                //     ],
                //     'fake' => true,
                //     'tab'  => 'Selects',
        // ],);
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

    protected function store()
    {
        // $formData = json_decode(request()->repeatable_form);

        $response = $this->traitStore();

        $this->EducationRepo->createOrUpdateRepo($this->crud->entry , $this->crud->getRequest());
        $this->experienceRepo->createOrUpdateRepo($this->crud->entry , $this->crud->getRequest());
          
       return $response;
    }


    protected function update($id)
    {
       
        $response = $this->traitUpdate();

        $this->EducationRepo->createOrUpdateRepo($this->crud->entry , $this->crud->getRequest());
        $this->experienceRepo->createOrUpdateRepo($this->crud->entry , $this->crud->getRequest());
        return $response;

    }

    protected function destroy($id)
    {
        // $this->crud->hasAccessOrFail('delete');
        $entry = $this->crud->getEntry($id);
        foreach($entry->experRelation as $item) {
            $item->delete();
        }
        foreach($entry->educatRelation as $item) {
            $item->delete();
        }
        $data = $entry->delete();
        return $data;
    }
}
