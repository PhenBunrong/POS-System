
    
    @include('crud::fields.select2', [
        "field" => [    // Select2Multiple = n-n relationship (with pivot table)
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
        ],
    ])

    @include('crud::fields.number', [
        "field" => [  
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
    ])
    @include('crud::fields.number', [
        "field" => [  
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
    ])
    @include('crud::fields.number', [
        "field" => [  
            'name'  => 'qty',
            'label' => 'Qty',
            'type'  => 'numer',
            'attributes' => [
                'placeholder'=>'Enter qty',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.number', [
        "field" => [  
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'select_from_array',
            'options'     => [
                0 => 'Draft',
                1 => 'Published'
            ],
            'allows_null' => false,
    'default'     => 1,
            'attributes' => [
                'placeholder'=>'Enter qty',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])

