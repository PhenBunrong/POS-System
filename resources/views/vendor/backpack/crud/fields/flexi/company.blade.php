@if (isset($entry))
    @include('crud::fields.hidden', [
            "field" => [  
                'value' => optional($entry->companiess)->id,
                'name'  => 'customers_id',
                'label' => 'ID',
                'type'  => 'hidden',
              
            ]
        ])
    @include('crud::fields.text', [
        "field" => [  
            'value' => optional($entry->companiess)->company_name,
            'name'  => 'company_name',
            'label' => 'Company Name',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter name',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'value' => optional($entry->companiess)->company_address,
            'name'  => 'company_address',
            'label' => 'Address',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter address',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'value' => optional($entry->companiess)->company_phone,
            'name'  => 'company_phone',
            'label' => 'Phone',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter phone',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
@else
    {{-- @include('crud::fields.hidden', [
        "field" => [  
            'name'  => 'id',
            'label' => 'ID',
            'type'  => 'hidden',
        
        ]
    ]) --}}
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'company_name',
            'label' => 'Company Name',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter name',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'company_address',
            'label' => 'Address',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter address',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'company_phone',
            'label' => 'Phone',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter phone',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
@endif