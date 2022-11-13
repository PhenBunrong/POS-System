@if (isset($entry))

  @foreach ($entry->educatRelation as $item)
        @include('crud::fields.hidden', [
            "field" => [  
                'value' => $item->id,
                'name'  => 'educa_id',
                'label' => 'ID',
                'type'  => 'hidden',
            
            ]
        ])
        @include('crud::fields.text', [
            "field" => [  
                'value' => $item->school,
                'name'  => 'school',
                'label' => 'School',
                'type'  => 'text',
                'attributes' => [
                    'placeholder'=>'Enter',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.text', [
            "field" => [  
                'value' => $item->degree,
                'name'  => 'degree',
                'label' => 'Degree',
                'type'  => 'text',
                'attributes' => [
                    'placeholder'=>'Enter Degree',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.text', [
            "field" => [  
                'value' => $item->studend,
                'name'  => 'studend',
                'label' => 'Studend',
                'type'  => 'text',
                'attributes' => [
                    'placeholder'=>'Enter Studend',
                ],
                'wrapper' => [
                    "class" => 'form-group col-md-6'
                ]
            ]
        ])
        @include('crud::fields.text', [
            "field" => [  
                'value' => $item->grade,
                'name'  => 'grade',
                'label' => 'Grade',
                'type'  => 'text',
                'attributes' => [
                    'placeholder'=>'Enter Grade',
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
            'name'  => 'school',
            'label' => 'School',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter School',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'degree',
            'label' => 'Degree',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter Degree',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'studend',
            'label' => 'Studend',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter Studend',
            ],
            'wrapper' => [
                "class" => 'form-group col-md-6'
            ]
        ]
    ])
    @include('crud::fields.text', [
        "field" => [  
            'name'  => 'grade',
            'label' => 'grade',
            'type'  => 'text',
            'attributes' => [
                'placeholder'=>'Enter grade',
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