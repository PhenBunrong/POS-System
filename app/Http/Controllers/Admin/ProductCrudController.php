<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Unit;
use App\Models\Color;
use App\Models\Files;
use App\Models\Writer;
use App\Models\Product;
use App\Models\Category;
use App\Traits\UploadFile;
use App\Models\Publication;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Repositories\RelateImageRepo;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use SoftDeletes;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;
    use \App\Traits\UploadFile;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
        $this->crud->enableExportButtons();

        $this->crud->addButtonFromView('line', 'ImgProductpopup', 'ImgProductpopup', 'beginning');
        // select2_ajax filter
        $this->crud->addFilter([
            'name'        => 'brand_id',
            'type'        => 'select2_ajax',
            'label'       => 'Select by Brands',
            'placeholder' => 'Pick a brand'
        ],
        url('ajax-brand-options'), // the ajax route
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'brand_id', $value);
        });
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addButtonFromView('top', 'maplist', 'maplist', 'end');
        CRUD::column('id');
        CRUD::column('code');
        CRUD::addColumn(
            [
                'name'      => 'image', // The db column name
                'label'     => 'Thumbnail', // Table column heading
                'type'      => 'closure',
                'function' => function($entry){
                    if(!empty($entry->image)){
                        return '<a href="'.asset($entry->image).'" data-lightbox="image-1" data-title="My caption"><img src="'.asset($entry->image).'" style="width:45px"></a>';
                    }
                    return '<a href="http://127.0.0.1:8000/no-img.jpg" data-lightbox="image-1" data-title="My caption"><img src="http://127.0.0.1:8000/no-img.jpg" style="width:45px"></a>';
                }
            ],
        );

        CRUD::column('name');
        CRUD::column('brand_id');
        CRUD::column('tax');
        CRUD::column('price');
        CRUD::column('sku');
        CRUD::column('stock');
        CRUD::column('discount');
        CRUD::column('expiration_date');
        CRUD::column('minimum_amount');
        CRUD::column('free_delivery');
        CRUD::column('total_view');
        CRUD::column('description');
        CRUD::column('features');
        CRUD::column('creator');
        CRUD::column('slug');
        $this->crud->addColumn([
            'name'     => 'status',
            'label'    => 'Status',
            'type'     => 'closure',
            'function' => function($entry) {
                return $entry->StatusStr;
            }
        ]);
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
        CRUD::setValidation(ProductRequest::class);

        
        $this->crud->addField([
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'attributes' => [
                'placeholder'=>'Enter name',
            ],
            'wrapper' => [
                'class'=>'form-group col-md-4'
            ]
        ]);
        $this->crud->addField(
            [    // Select2Multiple = n-n relationship (with pivot table)
                'lable' => 'Select Brand',
                'type'  =>  'select2',
                'name'  => 'brand', // the method that defines the relationship in your Model
                //optional
                'entity' => 'brand', // the method that defines the relationship in your Model
                'model'  => "App\Models\Brand", // foreign key model
                'attribute' => 'name',
                'wrapper' => [
                    'class'=>'form-group col-md-4'
                ]
                // foreign key attribute that is shown to user
                // 'pivot'     => true // on create&update, do you need to add/delete pivot table entries?
            ],);
        
            $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'mainCategory',
                    'ajax'          => true,
                    'inline_create' => true,
                    // 'model' => "App\Models\MainCategory",
                    'minimum_input_length' => 0,
                    'method'        => 'POST',
                    'data_source'   => backpack_url("product/fetch/main-category"),
                    // 'attribute' => 'name', // attribute for table
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ],
                    'attributes'    => [
                        'class'     => 'form-control product_main_category'
                    ],
                    
    
                    // 'attributes'    => [
                    //     'onChange'  => '
                    //         let value = $(this).val();
                    //         let control_url = $(this).data("/main-category"); // call to route

                    //         alert(control_url)
                    //         '
                    // ]
                    
                ]
           );
           $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'category',
                    'ajax'          => true,
                    'inline_create' => true,
                    'minimum_input_length' => 0,
                    'method' => 'POST',
                    'data_source'   => backpack_url("product/fetch/category"),
                    'attributes'    => [
                        'class'     => 'form-control product_category'
                    ],
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ]
                ]
            );
            $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'subCategory',
                    'ajax'          => true,
                    'inline_create' => true,
                    'minimum_input_length' => 0, 
                    'method'        => 'POST',
                    'data_source'   => backpack_url("product/fetch/sub-category"),
                    'attributes'    => [
                        'class'     => 'form-control product_sub_category'
                    ],
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ]
                ]
           );
            $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'writer',
                    'ajax'          => true,
                    'inline_create' => true,
                    'minimum_input_length' => 0, 
                    'method'        => 'POST',
                    'data_source'   => backpack_url("product/fetch/writer"),
                    'attributes'    => [
                        'class'     => 'form-control category-class'
                    ],
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ]
                ]
           );
            $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'publication',
                    'ajax'          => true,
                    'inline_create' => true,
                    'minimum_input_length' => 0, 
                    'method'        => 'POST',
                    'data_source'   => backpack_url("product/fetch/publication"),
                    'attributes'    => [
                        'class'     => 'form-control category-class'
                    ],
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ]
                ]
           );
            $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'size',
                    'ajax'          => true,
                    'inline_create' => true,
                    'minimum_input_length' => 0, 
                    'method'        => 'POST',
                    'data_source'   => backpack_url("product/fetch/size"),
                    'attributes'    => [
                        'class'     => 'form-control category-class'
                    ],
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ]
                ]
           );
            $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'unit',
                    'ajax'          => true,
                    'inline_create' => true,
                    'minimum_input_length' => 0, 
                    'method'        => 'POST',
                    'data_source'   => backpack_url("product/fetch/unit"),
                    'attributes'    => [
                        'class'     => 'form-control category-class'
                    ],
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ]
                ]
           );
            $this->crud->addField(
                [
                    'type'          => "relationship",
                    'name'          => 'color',
                    'ajax'          => true,
                    'inline_create' => true,
                    'minimum_input_length' => 0, 
                    'method'        => 'POST',
                    'data_source'   => backpack_url("product/fetch/color"),
                    'attributes'    => [
                        'class'     => 'form-control category-class'
                    ],
                    'wrapper'       => [
                        'class'     =>'form-group col-md-4'
                    ]
                ]
           );
            $this->crud->addField([
                'label'         => 'Price',
                'name'          => 'price',
                'type'          => 'number',
                'prefix'          => '$',
                'suffix'          => '.00',
                'attributes' => [
                    'placeholder'=>'Enter price',
                ],
                'wrapper'       => [
                    'class'     =>'form-group col-md-4'
                ]
            ]);
            $this->crud->addField([
                'label'         => 'Tax',
                'name'          => 'tax',
                'type'          => 'number',
                'attributes' => [
                    'placeholder'=>'Enter tax',
                ],
                'wrapper'       => [
                    'class'     =>'form-group col-md-4'
                ]
            ]);
            $this->crud->addField([
                'label'         => 'Stock',
                'name'          => 'stock',
                'type'          => 'number',
                'attributes' => [
                    'placeholder'=>'Enter stock',
                ],
                'wrapper'       => [
                    'class'     =>'form-group col-md-4'
                ]
            ]);
            $this->crud->addField([
                'label'         => 'Discount',
                'name'          => 'discount',
                'type'          => 'number',
                'attributes' => [
                    'placeholder'=>'Enter discount',
                ],
                'wrapper'       => [
                    'class'     =>'form-group col-md-4'
                ]
            ]);
            $this->crud->addField([
                'label'         => 'Expiration Date',
                'name'          => 'expiration_date',
                'type'          => 'date',
                'wrapper'       => [
                    'class'     =>'form-group col-md-4'
                ]
            ]);
            $this->crud->addField([
                'label'         => 'Minimum Amount',
                'name'          => 'minimum_amount',
                'type'          => 'number',
                'wrapper'       => [
                    'class'     =>'form-group col-md-4'
                ]
            ]);
            // $this->crud->addField([
            //     'label'         => "Thumbnail_Image",
            //     'name'          => "image",
            //     'type'          => 'hidden',
            //     'upload'        => true,
            //     'crop'          => false, // set to true to allow cropping, false to disable
            //     'aspect_ratio'  => false, // omit or set to 0 to allow any aspect ratio
            //     'wrapper' => [
            //         'class'=>'form-group col-md-5'
            //     ]
            // ]);
            $this->crud->addField([
                'label'         => "Thumbnail_Image",
                'name'          => "image",
                'value'         => "https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/photo-front.jpg",
                'upload'        => true,
                'crop'          => true, // set to true to allow cropping, false to disable
                'aspect_ratio'  => 0,
                'type'          => 'flexi.imageCustom.IImage',

                'wrapper' => [
                    'class'=>'form-group col-md-5'
                ]
            ]);
            $this->crud->addField(
                [    
                    'label'     => "Imageg Multiple",
                    'name'      => "file_upload_with_preview2",
                    'upload'    => true,
                    'type'      => 'fileinput.file_upload_with_preview2',
                    'wrapper'   => [
                        'class' =>'form-group col-md-12'
                    ]
                ],
            );
            $this->crud->addField([
                'label'     => 'Description',
                'name'      => 'description',
                'type'      => 'textarea',
                'attributes' => [
                    'placeholder'=>'Enter description',
                ],
                'wrapper'   => [
                    'class' =>'form-group col-md-12'
                ]
            ]);
            $this->crud->addField([
                'label'     => 'Features',
                'name'      => 'features',
                'type'      => 'ckeditor',
                'attributes' => [
                    'placeholder'=>'Enter features',
                ],
                'wrapper'   => [
                    'class' =>'form-group col-md-12'
                ]
            ]);
            
            CRUD::addField([   // select_from_array
                'label'     => 'Free_delivery',
                'name'      => 'free_delivery',
                'type'      => 'select_from_array',
                'wrapper'   => [
                    'class' =>'form-group col-md-4'
                ],
                'options'    => [
                    0 => 'On',
                    1 => 'Off'
                ],
                'allows_null' => false,
                'default'     => 1,
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ],);
            CRUD::addField([   // select_from_array
                'label'     => 'Status',
                'name'      => 'status',
                'type'      => 'select_from_array',
                'wrapper'   => [
                    'class' =>'form-group col-md-4'
                ],
                'options'   => [
                    0 => 'Inactive',
                    1 => 'Active'
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

    protected $field = ['profile'];

    public function store()
    {
        // dd($this->field);
        $response = $this->traitStore();
        $entry = $this->crud->entry; //model

        DB::beginTransaction();
        try{
            // $this->updateOrInsertMorpOne('profile',$user);
            $this->updateOrInsertMorphMany($this->field, $entry);

            DB::commit();
        }
        catch(\Exception $exp)
        {
            DB::rollBack();
            return response()->json(['Massage' => $exp->getMessage()], 500);
        }
        return $response;
    }

    protected function update($id)
    {
       
        $response = $this->traitUpdate();

        $entry = $this->crud->entry; //model
        
        DB::beginTransaction();
        try{
            // $this->updateOrInsertMorpOne('profile',$user);
            $this->updateOrInsertMorphMany(['profile'], $entry);

            DB::commit();
        }
        catch(\Exception $exp)
        {
            DB::rollBack();
            return response()->json(['Massage' => $exp->getMessage()], 500);
        }

        return $response;

    }

    protected function destroy($id)
    {
        // $this->crud->hasAccessOrFail('delete');
        $entry = $this->crud->getEntry($id);
        
        $entry->files()->delete();
        
        $data = $entry->delete();
        return $data;
    }

    
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
// fetch Model
    protected function fetchMainCategory()
    {
        return $this->fetch(MainCategory::class);
    }
    protected function fetchCategory()
    {
        return $this->fetch(Category::class);
    }
    protected function fetchSubCategory()
    {
        return $this->fetch(SubCategory::class);
    }
    protected function fetchColor()
    {
        return $this->fetch(Color::class);
    }
    protected function fetchPublication()
    {
        return $this->fetch(Publication::class);
    }
    protected function fetchSize()
    {
        return $this->fetch(Size::class);
    }
    protected function fetchUnit()
    {
        return $this->fetch(Unit::class);
    }
    protected function fetchWriter()
    {
        return $this->fetch(Writer::class);
    }
//
    public function getProduct(){
        $products = Product::active()->with(['category', 'subCategory', 'mainCategory', 'color', 'files', 'publication', 'size', 'unit', 'vendor', 'writer'])
                                ->orderBy('id','DESC')->paginate(10);
        return view('vendor.backpack.crud.columns.productList',compact('products'));
    }

    public function getFile($id){
            
        $products = $this->crud->getEntry($id); //model
        return view('vendor.backpack.crud.columns.showProduct',compact('products'));
    }

    public function deleteFile($id){
        $data = Files::find($id);

        // dd($data);
        $data->delete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $products = Product::onlyTrashed()->findOrFail($id);
        $products->restore();

        return redirect()->back();
    }

    public function forecDelete($id)
    {
        $products = Product::onlyTrashed()->findOrFail($id);
        $products->forceDelete();

        return redirect()->back();
    }
}
