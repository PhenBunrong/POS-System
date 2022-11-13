@if (isset($entry))

  @foreach ($entry->experRelation as $item)
        @include('crud::fields.hidden', [
            "field" => [  
                'value' => $item->id,
                'name'  => 'exper_id',
                'label' => 'ID',
                'type'  => 'hidden',
            
            ]
        ])
        @include('crud::fields.text', [
            "field" => [  
                'value' => $item->title,
                'name'  => 'title',
                'label' => 'Title',
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
                'value' => $item->employment_type,
                'name'  => 'employment_type',
                'label' => 'Employment Type',
                'type'  => 'text',
                'attributes' => [
                    'placeholder'=>'Enter employment',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.text', [
            "field" => [  
                'value' => $item->company_name,
                'name'  => 'company_name',
                'label' => 'Company Name',
                'type'  => 'text',
                'attributes' => [
                    'placeholder'=>'Enter company',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.text', [
            "field" => [  
                'value' => $item->location,
                'name'  => 'location',
                'label' => 'Location',
                'type'  => 'text',
                'attributes' => [
                    'placeholder'=>'Enter location',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.date', [
            "field" => [  
                'value' => $item->start_date,
                'name'  => 'start_date',
                'label' => 'Start Date',
                'type'  => 'date',
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.date', [
            "field" => [  
                'value' => $item->start_end,
                'name'  => 'start_end',
                'label' => 'Start End',
                'type'  => 'date',
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.textarea', [
            "field" => [  
                'value' => $item->description,
                'name'  => 'description',
                'label' => 'Description',
                'type'  => 'textarea',
                'attributes' => [
                    'placeholder'=>'Enter description',
                ],
            ]
        ])
  @endforeach

@else

    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'title',
            'label' => 'Title',
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
            'name'  => 'employment_type',
            'label' => 'Employment Type',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter employment',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'company_name',
            'label' => 'Company Name',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter company',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'location',
            'label' => 'Location',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter location',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.date', [
        "field" => [  
            'name'  => 'start_date',
            'label' => 'Start Date',
            'type'  => 'date',
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.date', [
        "field" => [  
            'name'  => 'start_end',
            'label' => 'Start End',
            'type'  => 'date',
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.textarea', [
        "field" => [  
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'textarea',
            'attributes' => [
                'placeholder'=>'Enter description',
            ],
        ]
    ])
@endif