<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testrepeattable;
use App\Http\Requests\TestRequest;
use App\Http\Requests\TestrepeattableRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Test::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/test');
        CRUD::setEntityNameStrings('test', 'tests');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setModel(Testrepeattable::class);

        CRUD::column('first_name');
        CRUD::column('last_name');
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
        CRUD::setValidation(TestrepeattableRequest::class);

        CRUD::addField(
            [   // repeatable
                'name'  => 'repeatable_form',
                'label' => 'Company Form',
                'type'  => 'repeatable',
                'fields' => [
                    [
                        'name'    => 'first_name',
                        'type'    => 'text',
                        'label'   => 'First Name',
                        'wrapper' => ['class' => 'form-group col-md-6'],
                    ],
                    [
                        'name'    => 'last_name',
                        'type'    => 'text',
                        'label'   => 'Last Name',
                        'wrapper' => ['class' => 'form-group col-md-6'],
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

        $response = $this->traitStore();
            foreach($formData as $item){
                Testrepeattable::create([
                    'id' => $this->crud->entry->id,
                    'first_name' => $item->first_name,
                    'last_name' => $item->last_name,
                ]);
            }

       return $response;
    }

    protected function update($id)
    {
        // dd(Testrepeattable::where('id', $id)->get());

    //     $formData = json_decode(request()->repeatable_form);

    //     $response = $this->traitStore();
    //         foreach($formData as $item){
    //             Testrepeattable::create([
    //                 'id' => $this->crud->entry->id,
    //                 'first_name' => $item->first_name,
    //                 'last_name' => $item->last_name,
    //             ]);
    //         }

    //    return $response;

    }

    public function destroy($id)
    {
        
    }
}
