@extends(backpack_view('blank'))

@php
    // [
    //     'type'        => 'jumbotron',
    //     'heading'     => trans('backpack::base.welcome'),
    //     'content'     => trans('backpack::base.use_sidebar'),
    //     'button_link' => backpack_url('logout'),
    //     'button_text' => trans('backpack::base.logout'),
    // ];

    $widgets['before_content'][] =
    [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [ // widgets 
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-primary mb-2',
                'value'       => $user,
                'description' => 'Registered users.',
                'progress'    => $user, // integer
                'hint'        => '8544 more until next milestone.',
                'wrapper' => [
                        'class' => 'col-sm-6 col-md-3', // customize the class on the parent element (wrapper)
                        'style' => 'border-radius: 10px;',
                    ]
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-primary mb-2',
                'value'       => $member,
                'description' => 'Members Count.',
                'progress'    => $member, // integer
                'hint'        => '8544 more until next milestone.',
                'wrapper' => [
                        'class' => 'col-sm-6 col-md-3', // customize the class on the parent element (wrapper)
                        'style' => 'border-radius: 10px;',
                    ]
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-success mb-2',
                'value'       => $product,
                'description' => 'Products Count.',
                'progress'    => $product, // integer
                'hint'        => '8544 more until next milestone.',
                'wrapper' => [
                        'class' => 'col-sm-6 col-md-3', // customize the class on the parent element (wrapper)
                        'style' => 'border-radius: 10px;',
                    ]
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-success mb-2',
                'value'       => $brand,
                'description' => 'Brands Count.',
                'progress'    => $brand, // integer
                'hint'        => '8544 more until next milestone.',
                'wrapper' => [
                        'class' => 'col-sm-6 col-md-3', // customize the class on the parent element (wrapper)
                        'style' => 'border-radius: 10px;',
                    ]
            ],
        ]
    ];
    $widgets['after_content'][] =
    [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [ // widgets 
            [ // widgets
                'type'       => 'chart',
                'controller' => \App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,

                // OPTIONALS

                'class'   => 'card',
                'wrapper' => ['class'=> 'col-md-6'] ,
                'content' => [
                    'header' => 'Chart User Register', 
                    //  'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                ],
            ],
            [ // widgets
                'type'       => 'chart',
                'controller' => \App\Http\Controllers\Admin\Charts\WeeklyMemberChartController::class,

                // OPTIONALS

                'class'   => 'card',
                'wrapper' => ['class'=> 'col-md-6'] ,
                'content' => [
                    'header' => 'Chart Member Register', 
                    //  'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                ],
            ],
        ]
    ];
    $widgets['after_content'][] =
    [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [ // widgets 
            [ // widgets
                'type'       => 'chart',
                'controller' => \App\Http\Controllers\Admin\Charts\WeeklyProductChartController::class,

                // OPTIONALS

                'class'   => 'card',
                'wrapper' => ['class'=> 'col-md-4'] ,
                'content' => [
                    'header' => 'Chart Product', 
                    //  'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                ],
            ],
            [ // widgets
               'type'       => 'chart',
                'controller' => \App\Http\Controllers\Admin\Charts\WeeklyProductChartController::class,
            
                // OPTIONALS

                'class'   => 'card',
                'wrapper' => ['class'=> 'col-md-4'] ,
                'content' => [
                    'header' => 'Chart Product', 
                    //  'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                ],
            ],
            [ // widgets
               'type'       => 'chart',
                'controller' => \App\Http\Controllers\Admin\Charts\WeeklyProductChartController::class,
            
                // OPTIONALS

                'class'   => 'card',
                'wrapper' => ['class'=> 'col-md-4'] ,
                'content' => [
                    'header' => 'Chart Product', 
                    //  'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                ],
            ],
        ]
    ];
        
        



    // Widget::add([ 
    //     'type'       => 'chart',
    //     'controller' => \App\Http\Controllers\Admin\Charts\WeeklyProductChartController::class,

    //     // OPTIONALS

    //     'class'   => 'card',
    //     'wrapper' => ['class'=> 'col-md-5'] ,
    //     'content' => [
    //         'header' => 'Chart Product', 
    //         //  'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
    //     ],
    // ])->to('after_content');

@endphp


@section('content')
    {{-- <main class="main pt-2">

        <div class="container-fluid animated fadeIn">
            <div name="widget_229464326" section="before_content" class="row">
                <div class="col-sm-6 col-lg-3">  <div class="card border-0 text-white bg-primary">
                <div class="card-body">
                        <div class="text-value">132</div>
                
                        <div>Registered users.</div>
                        
                        <div class="progress progress-white progress-xs my-2">
                    <div class="progress-bar" role="progressbar" style="width: 13.2%" aria-valuenow="13.2" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                    <small class="text-muted">868 more until next milestone.</small>
                </div>
            </div>
        </div>    
        <div class="col-sm-6 col-lg-3">  <div class="card border-0 text-white bg-success">
            <div class="card-body">
                    <div class="text-value">1031</div>
            
                    <div>Articles.</div>
                    
                    <div class="progress progress-white progress-xs my-2">
                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
                <small class="text-muted">Great! Don't stop.</small>
            </div>
            
            </div>
                </div>
                
                    
                    <div class="col-sm-6 col-lg-3">  <div class="card border-0 text-white bg-warning">
                <div class="card-body">
                        <div class="text-value">19 days</div>
                
                        <div>Since last article.</div>
                        
                        <div class="progress progress-white progress-xs my-2">
                    <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                        
                        <small class="text-muted">Post an article every 3-4 days.</small>
                    </div>
                
                </div>
                </div>
                
                    
                    <div class="col-sm-6 col-lg-3">  <div class="card border-0 text-white bg-dark">
                <div class="card-body">
                        <div class="text-value">210</div>
                
                        <div>Products.</div>
                        
                        <div class="progress progress-white progress-xs my-2">
                    <div class="progress-bar" role="progressbar" style="width: 280%" aria-valuenow="280" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                        
                        <small class="text-muted">Try to stay under 75 products.</small>
                    </div>
                
                </div>
                </div>
                    
                </div>


                
                                        
                    <div class="row" name="widget_865557912" section="before_content">

                        <div class="col-md-6">  <div class="card">
                    <div class="card-header">New Users Past 7 Days</div>
                    <div class="card-body">

                

                <div class="card-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas style="display: block; width: 475px; height: 400px;" id="xijvahkzgryusnwoetlbqpdcf" height="400" width="475" class="chartjs-render-monitor"></canvas>
                <div id="xijvahkzgryusnwoetlbqpdcf_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
                <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                            <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                            <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                            <stop stop-color="#22292F" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(1 1)">
                            <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                            </path>
                            <circle fill="#22292F" cx="36" cy="18" r="1">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                            </circle>
                        </g>
                    </g>
                </svg>
                </div>

            </div>

            </div>
            </div>
        </div>

    
                            
        <div class="col-md-6">  <div class="card">
            <div class="card-header">New Entries</div>
                <div class="card-body">
                    <div class="card-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas style="display: block; width: 475px; height: 400px;" id="agvlksdwtufhixbjpmzocrnqe" height="400" width="475" class="chartjs-render-monitor"></canvas>
                            <div id="agvlksdwtufhixbjpmzocrnqe_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
                                <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                                            <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                                            <stop stop-color="#22292F" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <g transform="translate(1 1)">
                                            <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                                            </path>
                                            <circle fill="#22292F" cx="36" cy="18" r="1">
                                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                                            </circle>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </div>


    
            
            
            <div class="row" name="widget_696407136" section="after_content">

            <div class="col-sm-6 col-md-4">	<div class="card">
                                    <div class="card-header">Some card title</div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit. <i>Nulla posuere</i>, sem et porttitor mollis, massa nibh sagittis nibh, id porttitor nibh turpis sed arcu.</div>
            </div>
        </div>
    
                            
        <div class="col-sm-6 col-md-4">	<div class="card">
                                    <div class="card-header">Another card title</div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit. <i>Nulla posuere</i>, sem et porttitor mollis, massa nibh sagittis nibh, id porttitor nibh turpis sed arcu.</div>
            </div>   
        </div>
    
                            
            <div class="col-sm-6 col-md-4">	
                <div class="card">
                    <div class="card-header">Yet another card title</div>
                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit. <i>Nulla posuere</i>, sem et porttitor mollis, massa nibh sagittis nibh, id porttitor nibh turpis sed arcu.</div>
                </div>
            </div>
        </div>


    
                            
        <div class="alert alert-warning bg-dark border-0 mb-4" role="alert">

        
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        
            <h4 class="alert-heading">Demo Refreshes Every Hour on the Hour</h4>
        
            <p>At hh:00, all custom entries are deleted, all files, everything. This cleanup is necessary because developers like to joke with their test entries, and mess with stuff. But you know that :-) Go ahead - make a developer smile.</p>
        
            </div>


            
                                    
                <div class="row" name="widget_762515228" section="after_content">

                    <div class="col-md-4">  <div class="card">
                <div class="card-header">Pie Chart - Chartjs</div>
                <div class="card-body">

            

            <div class="card-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas style="display: block; width: 293px; height: 400px;" id="iwqoajevnszlrgtdmpybkhxuc" height="400" width="293" class="chartjs-render-monitor"></canvas>
            <div id="iwqoajevnszlrgtdmpybkhxuc_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
            <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                        <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                        <stop stop-color="#22292F" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)">
                        <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <circle fill="#22292F" cx="36" cy="18" r="1">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </circle>
                    </g>
                </g>
            </svg>
            </div>

            </div>

            </div>
            </div>
            </div>

            
                                    
                <div class="col-md-4">  <div class="card">
                <div class="card-header">Pie Chart - Echarts</div>
                <div class="card-body">

            

            <div class="card-wrapper">
                <div id="lgiaywoekhbrjzmstqvupxcfn" style="height: 400px !important; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;" _echarts_instance_="ec_1652364608054"><div style="position: relative; width: 293px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="293" height="400" style="position: absolute; left: 0px; top: 0px; width: 293px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
            <div id="lgiaywoekhbrjzmstqvupxcfn_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
            <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                        <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                        <stop stop-color="#22292F" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)">
                        <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <circle fill="#22292F" cx="36" cy="18" r="1">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </circle>
                    </g>
                </g>
            </svg>
            </div>

            </div>

            </div>
            </div>
            </div>

            
                                    
                <div class="col-md-4">  <div class="card">
                <div class="card-header">Pie Chart - Highcharts</div>
                <div class="card-body">

            

            <div class="card-wrapper">
                <div id="ztiqymrkofsnjhlauvcxegdpb" style="height: 400px !important;" data-highcharts-chart="0"><div id="highcharts-i3qupz4-0" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 293px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="293" height="400" viewBox="0 0 293 400"><desc>Created with Highcharts 6.2.0</desc><defs><clipPath id="highcharts-i3qupz4-5"><rect x="0" y="0" width="273" height="375" fill="none"></rect></clipPath></defs><rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="293" height="400" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="10" y="10" width="273" height="375"></rect><rect fill="none" class="highcharts-plot-border" data-z-index="1" x="10" y="10" width="273" height="375"></rect><g class="highcharts-series-group" data-z-index="3"><g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-tracker" transform="translate(10,10) scale(1 1)"><path fill="rgb(70, 127, 208)" d="M 120.97739227438983 76.50000230229398 A 111 111 0 0 1 169.06080091585153 87.44421848125475 L 121 187.5 A 0 0 0 0 0 121 187.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" stroke-linejoin="round" class="highcharts-point highcharts-color-0"></path><path fill="rgb(66, 186, 150)" d="M 169.16083265029587 87.49232930204705 A 111 111 0 0 1 229.2021458846527 162.73519380337626 L 121 187.5 A 0 0 0 0 0 121 187.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" stroke-linejoin="round" class="highcharts-point highcharts-color-1"></path><path fill="rgb(96, 92, 168)" d="M 229.22685658565342 162.84340831362928 A 111 111 0 1 1 12.758549604333808 162.90755367511127 L 121 187.5 A 0 0 0 1 0 121 187.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" stroke-linejoin="round" class="highcharts-point highcharts-color-2"></path><path fill="rgb(255, 193, 7)" d="M 12.783196167280636 162.799324538978 A 111 111 0 0 1 120.84582322687405 76.50010707427403 L 121 187.5 A 0 0 0 0 0 121 187.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" stroke-linejoin="round" class="highcharts-point highcharts-color-3"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-pie-series " transform="translate(10,10) scale(1 1)"></g></g><text x="147" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="147" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><g data-z-index="6" class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-tracker" transform="translate(10,10) scale(1 1)" opacity="1"><path fill="none" class="highcharts-data-label-connector highcharts-color-0" stroke="rgb(70, 127, 208)" stroke-width="1" d="M 157.37545168784033 50.03516438236287 C 152.37545168784033 50.03516438236287 148.37007487662666 67.5838668016357 147.03494927288878 73.43343427472664 L 145.6998236691509 79.28300174781758"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-1" stroke="rgb(66, 186, 150)" stroke-width="1" d="M 236.23823902799222 99.58793793791858 C 231.23823902799222 99.58793793791858 217.16527234356766 110.81075437137578 212.47428344875948 114.55169318252818 L 207.7832945539513 118.29263199368059"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-2" stroke="rgb(96, 92, 168)" stroke-width="1" d="M 126.00000000000001 328.5 C 121.00000000000001 328.5 121 310.5 121 304.5 L 121 298.5"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-3" stroke="rgb(255, 193, 7)" stroke-width="1" d="M 28.087937937918568 77.26176097200782 C 33.08793793791857 77.26176097200782 44.31075437137575 91.33472765643234 48.051693182528155 96.02571655124052 L 51.79263199368056 100.7167054460487"></path><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0 " data-z-index="1" transform="translate(162,40)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">HTML</tspan><tspan x="5" y="16">HTML</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-1 " data-z-index="1" transform="translate(241,90)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">CSS</tspan><tspan x="5" y="16">CSS</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-2 " data-z-index="1" transform="translate(131,319)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">PHP</tspan><tspan x="5" y="16">PHP</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-3 " data-z-index="1" transform="translate(0,67)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">JS</tspan><tspan x="5" y="16">JS</tspan></text></g></g><g class="highcharts-legend" data-z-index="7"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="8" height="8" visibility="hidden"></rect><g data-z-index="1"><g></g></g></g></svg></div></div>
            <div id="ztiqymrkofsnjhlauvcxegdpb_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
            <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                        <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                        <stop stop-color="#22292F" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)">
                        <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <circle fill="#22292F" cx="36" cy="18" r="1">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </circle>
                    </g>
                </g>
            </svg>
            </div>

            </div>

            </div>
            </div>
            </div>

                
            </div>


            
                                    
                <div class="row" name="widget_447628817" section="after_content">

                    <div class="col-md-6">  <div class="card">
                <div class="card-header">Line Chart - Chartjs</div>
                <div class="card-body">

            

            <div class="card-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas style="display: block; width: 475px; height: 400px;" id="wihfbreqxtvojndzgpkslyuca" height="400" width="475" class="chartjs-render-monitor"></canvas>
            <div id="wihfbreqxtvojndzgpkslyuca_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
            <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                        <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                        <stop stop-color="#22292F" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)">
                        <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <circle fill="#22292F" cx="36" cy="18" r="1">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </circle>
                    </g>
                </g>
            </svg>
            </div>

            </div>

            </div>
            </div>
            </div>

            
                                    
                <div class="col-md-6">  <div class="card">
                <div class="card-header">Line Chart - Echarts</div>
                <div class="card-body">

            

            <div class="card-wrapper">
                <div id="npjvyhgarcmiqukoesxzdbwfl" style="height: 400px !important; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;" _echarts_instance_="ec_1652364608055"><div style="position: relative; width: 475px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="475" height="400" style="position: absolute; left: 0px; top: 0px; width: 475px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
            <div id="npjvyhgarcmiqukoesxzdbwfl_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
            <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                        <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                        <stop stop-color="#22292F" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)">
                        <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <circle fill="#22292F" cx="36" cy="18" r="1">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </circle>
                    </g>
                </g>
            </svg>
            </div>

            </div>

            </div>
            </div>
            </div>

            
                                    
                <div class="col-md-6">  <div class="card">
                <div class="card-header">Line Chart - Highcharts</div>
                <div class="card-body">

            

            <div class="card-wrapper">
                <div id="yteqwdlhkvromjnauxbicspgz" style="height: 400px !important;" data-highcharts-chart="1"><div id="highcharts-i3qupz4-6" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 475px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="475" height="400" viewBox="0 0 475 400"><desc>Created with Highcharts 6.2.0</desc><defs><clipPath id="highcharts-i3qupz4-7"><rect x="0" y="0" width="388" height="312" fill="none"></rect></clipPath></defs><rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="475" height="400" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="77" y="10" width="388" height="312"></rect><g class="highcharts-grid highcharts-xaxis-grid " data-z-index="1"><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 173.5 10 L 173.5 322" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 270.5 10 L 270.5 322" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 367.5 10 L 367.5 322" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 464.5 10 L 464.5 322" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 76.5 10 L 76.5 322" opacity="1"></path></g><g class="highcharts-grid highcharts-yaxis-grid " data-z-index="1"><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 77 322.5 L 465 322.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 77 260.5 L 465 260.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 77 197.5 L 465 197.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 77 135.5 L 465 135.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 77 72.5 L 465 72.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 77 9.5 L 465 9.5" opacity="1"></path></g><rect fill="none" class="highcharts-plot-border" data-z-index="1" x="77" y="10" width="388" height="312"></rect><g class="highcharts-axis highcharts-xaxis " data-z-index="2"><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 173.5 322 L 173.5 332" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 270.5 322 L 270.5 332" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 367.5 322 L 367.5 332" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 465.5 322 L 465.5 332" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 76.5 322 L 76.5 332" opacity="1"></path><path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 77 322.5 L 465 322.5"></path></g><g class="highcharts-axis highcharts-yaxis " data-z-index="2"><text x="25.640625" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 25.640625 166)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="166"><tspan>Values</tspan></text><path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 77 10 L 77 322"></path></g><g class="highcharts-series-group" data-z-index="3"><g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-line-series " transform="translate(77,10) scale(1 1)" clip-path="url(#highcharts-i3qupz4-7)"><path fill="none" d="M 48.5 287.04 L 145.5 262.08 L 242.5 112.32 L 339.5 237.12" class="highcharts-graph" data-z-index="1" stroke="rgba(205, 32, 31, 1)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 38.5 287.04 L 48.5 287.04 L 145.5 262.08 L 242.5 112.32 L 339.5 237.12 L 349.5 237.12" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22" visibility="visible" data-z-index="2" class="highcharts-tracker-line"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-line-series highcharts-tracker" transform="translate(77,10) scale(1 1)"><path fill="rgba(205, 32, 31, 1)" d="M 52 287 A 4 4 0 1 1 51.99999800000017 286.99600000066664 Z" class="highcharts-point"></path><path fill="rgba(205, 32, 31, 1)" d="M 149 262 A 4 4 0 1 1 148.99999800000018 261.99600000066664 Z" class="highcharts-point"></path><path fill="rgba(205, 32, 31, 1)" d="M 246 112 A 4 4 0 1 1 245.99999800000018 111.99600000066667 Z" class="highcharts-point"></path><path fill="rgba(205, 32, 31, 1)" d="M 343 237 A 4 4 0 1 1 342.9999980000002 236.99600000066667 Z" class="highcharts-point"></path></g><g data-z-index="0.1" class="highcharts-series highcharts-series-1 highcharts-line-series " transform="translate(77,10) scale(1 1)" clip-path="url(#highcharts-i3qupz4-7)"><path fill="none" d="M 48.5 212.16 L 145.5 237.12 L 242.5 187.2 L 339.5 287.04" class="highcharts-graph" data-z-index="1" stroke="rgba(70, 127, 208, 1)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 38.5 212.16 L 48.5 212.16 L 145.5 237.12 L 242.5 187.2 L 339.5 287.04 L 349.5 287.04" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22" visibility="visible" data-z-index="2" class="highcharts-tracker-line"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-1 highcharts-line-series highcharts-tracker" transform="translate(77,10) scale(1 1)"><path fill="rgba(70, 127, 208, 1)" d="M 48 208 L 52 212 48 216 44 212 Z" class="highcharts-point"></path><path fill="rgba(70, 127, 208, 1)" d="M 145 233 L 149 237 145 241 141 237 Z" class="highcharts-point"></path><path fill="rgba(70, 127, 208, 1)" d="M 242 183 L 246 187 242 191 238 187 Z" class="highcharts-point"></path><path fill="rgba(70, 127, 208, 1)" d="M 339 283 L 343 287 339 291 335 287 Z" class="highcharts-point"></path></g><g data-z-index="0.1" class="highcharts-series highcharts-series-2 highcharts-line-series " transform="translate(77,10) scale(1 1)" clip-path="url(#highcharts-i3qupz4-7)"><path fill="none" d="M 48.5 112.32 L 145.5 287.04 L 242.5 212.16 L 339.5 237.12" class="highcharts-graph" data-z-index="1" stroke="rgb(255, 193, 7)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 38.5 112.32 L 48.5 112.32 L 145.5 287.04 L 242.5 212.16 L 339.5 237.12 L 349.5 237.12" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22" visibility="visible" data-z-index="2" class="highcharts-tracker-line"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-2 highcharts-line-series highcharts-tracker" transform="translate(77,10) scale(1 1)"><path fill="rgb(255, 193, 7)" d="M 44 108 L 52 108 52 116 44 116 Z" class="highcharts-point"></path><path fill="rgb(255, 193, 7)" d="M 141 283 L 149 283 149 291 141 291 Z" class="highcharts-point"></path><path fill="rgb(255, 193, 7)" d="M 238 208 L 246 208 246 216 238 216 Z" class="highcharts-point"></path><path fill="rgb(255, 193, 7)" d="M 335 233 L 343 233 343 241 335 241 Z" class="highcharts-point"></path></g><g data-z-index="0.1" class="highcharts-series highcharts-series-3 highcharts-line-series " transform="translate(77,10) scale(1 1)" clip-path="url(#highcharts-i3qupz4-7)"><path fill="none" d="M 48.5 287.04 L 145.5 212.16 L 242.5 137.28 L 339.5 37.44" class="highcharts-graph" data-z-index="1" stroke="rgb(66, 186, 150)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 38.5 287.04 L 48.5 287.04 L 145.5 212.16 L 242.5 137.28 L 339.5 37.44 L 349.5 37.44" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22" visibility="visible" data-z-index="2" class="highcharts-tracker-line"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-3 highcharts-line-series highcharts-tracker" transform="translate(77,10) scale(1 1)"><path fill="rgb(66, 186, 150)" d="M 48 283 L 52 291 44 291 Z" class="highcharts-point"></path><path fill="rgb(66, 186, 150)" d="M 145 208 L 149 216 141 216 Z" class="highcharts-point"></path><path fill="rgb(66, 186, 150)" d="M 242 133 L 246 141 238 141 Z" class="highcharts-point"></path><path fill="rgb(66, 186, 150)" d="M 339 33 L 343 41 335 41 Z" class="highcharts-point"></path></g><g data-z-index="0.1" class="highcharts-series highcharts-series-4 highcharts-line-series " transform="translate(77,10) scale(1 1)" clip-path="url(#highcharts-i3qupz4-7)"><path fill="none" d="M 48.5 262.08 L 145.5 62.39999999999998 L 242.5 187.2 L 339.5 237.12" class="highcharts-graph" data-z-index="1" stroke="rgb(96, 92, 168)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 38.5 262.08 L 48.5 262.08 L 145.5 62.39999999999998 L 242.5 187.2 L 339.5 237.12 L 349.5 237.12" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22" visibility="visible" data-z-index="2" class="highcharts-tracker-line"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-4 highcharts-line-series highcharts-tracker" transform="translate(77,10) scale(1 1)"><path fill="rgb(96, 92, 168)" d="M 44 258 L 52 258 48 266 Z" class="highcharts-point"></path><path fill="rgb(96, 92, 168)" d="M 141 58 L 149 58 145 66 Z" class="highcharts-point"></path><path fill="rgb(96, 92, 168)" d="M 238 183 L 246 183 242 191 Z" class="highcharts-point"></path><path fill="rgb(96, 92, 168)" d="M 335 233 L 343 233 339 241 Z" class="highcharts-point"></path></g></g><text x="238" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="238" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><g class="highcharts-legend" data-z-index="7" transform="translate(54,356)"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="367" height="29" visibility="visible"></rect><g data-z-index="1"><g><g class="highcharts-legend-item highcharts-line-series highcharts-color-undefined highcharts-series-0" data-z-index="1" transform="translate(8,3)"><path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="rgba(205, 32, 31, 1)" stroke-width="2"></path><path fill="rgba(205, 32, 31, 1)" d="M 12 11 A 4 4 0 1 1 11.999998000000167 10.996000000666664 Z" class="highcharts-point"></path><text x="21" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" data-z-index="2" y="15"><tspan>Red</tspan></text></g><g class="highcharts-legend-item highcharts-line-series highcharts-color-undefined highcharts-series-1" data-z-index="1" transform="translate(72.2734375,3)"><path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="rgba(70, 127, 208, 1)" stroke-width="2"></path><path fill="rgba(70, 127, 208, 1)" d="M 8 7 L 12 11 8 15 4 11 Z" class="highcharts-point"></path><text x="21" y="15" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" data-z-index="2"><tspan>Blue</tspan></text></g><g class="highcharts-legend-item highcharts-line-series highcharts-color-undefined highcharts-series-2" data-z-index="1" transform="translate(140.091796875,3)"><path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="rgb(255, 193, 7)" stroke-width="2"></path><path fill="rgb(255, 193, 7)" d="M 4 7 L 12 7 12 15 4 15 Z" class="highcharts-point"></path><text x="21" y="15" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" data-z-index="2"><tspan>Yellow</tspan></text></g><g class="highcharts-legend-item highcharts-line-series highcharts-color-undefined highcharts-series-3" data-z-index="1" transform="translate(222.5625,3)"><path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="rgb(66, 186, 150)" stroke-width="2"></path><path fill="rgb(66, 186, 150)" d="M 8 7 L 12 15 4 15 Z" class="highcharts-point"></path><text x="21" y="15" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" data-z-index="2"><tspan>Green</tspan></text></g><g class="highcharts-legend-item highcharts-line-series highcharts-color-undefined highcharts-series-4" data-z-index="1" transform="translate(299.515625,3)"><path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="rgb(96, 92, 168)" stroke-width="2"></path><path fill="rgb(96, 92, 168)" d="M 4 7 L 12 7 8 15 Z" class="highcharts-point"></path><text x="21" y="15" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" data-z-index="2"><tspan>Purple</tspan></text></g></g></g></g><g class="highcharts-axis-labels highcharts-xaxis-labels " data-z-index="7"><text x="125.5" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="341" opacity="1">One</text><text x="222.5" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="341" opacity="1">Two</text><text x="319.5" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="341" opacity="1">Three</text><text x="416.5" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="341" opacity="1">Four</text></g><g class="highcharts-axis-labels highcharts-yaxis-labels " data-z-index="7"><text x="62" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="326" opacity="1">0</text><text x="62" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="264" opacity="1">2.5</text><text x="62" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="201" opacity="1">5</text><text x="62" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="139" opacity="1">7.5</text><text x="62" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="76" opacity="1">10</text><text x="62" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">12.5</text></g></svg></div></div>
            <div id="yteqwdlhkvromjnauxbicspgz_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
            <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                        <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                        <stop stop-color="#22292F" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)">
                        <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <circle fill="#22292F" cx="36" cy="18" r="1">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </circle>
                    </g>
                </g>
            </svg>
            </div>

            </div>

            </div>
            </div>
            </div>

            
                                    
                <div class="col-md-6">  <div class="card">
                <div class="card-header">Line Chart - Frappe</div>
                <div class="card-body">

            

            <div class="card-wrapper">
                <div id="zlowfxjpskeghcndtqmrbyvia"><div class="chart-container"><div class="graph-svg-tip comparison" style="top: 0px; left: 0px; opacity: 0;"><span class="title"></span>
                        <ul class="data-point-list"></ul>
                        <div class="svg-pointer"></div></div><svg class="frappe-chart chart" width="475" height="400"><defs></defs><g class="line-chart chart-draw-area" transform="translate(50, 30)"><g class="y axis" transform=""><g transform="translate(0, 290)" stroke-opacity="1"><line class="line-horizontal " x1="-6" x2="401" y1="0" y2="0" style="stroke: rgb(218, 218, 218);"></line><text x="-10" y="0" dy="3px" font-size="10px" text-anchor="end">0</text></g><g transform="translate(0, 217.5)" stroke-opacity="1"><line class="line-horizontal " x1="-6" x2="401" y1="0" y2="0" style="stroke: rgb(218, 218, 218);"></line><text x="-10" y="0" dy="3px" font-size="10px" text-anchor="end">5</text></g><g transform="translate(0, 145)" stroke-opacity="1"><line class="line-horizontal " x1="-6" x2="401" y1="0" y2="0" style="stroke: rgb(218, 218, 218);"></line><text x="-10" y="0" dy="3px" font-size="10px" text-anchor="end">10</text></g><g transform="translate(0, 72.5)" stroke-opacity="1"><line class="line-horizontal " x1="-6" x2="401" y1="0" y2="0" style="stroke: rgb(218, 218, 218);"></line><text x="-10" y="0" dy="3px" font-size="10px" text-anchor="end">15</text></g><g transform="translate(0, 0)" stroke-opacity="1"><line class="line-horizontal " x1="-6" x2="401" y1="0" y2="0" style="stroke: rgb(218, 218, 218);"></line><text x="-10" y="0" dy="3px" font-size="10px" text-anchor="end">20</text></g></g><g class="x axis" transform=""><g transform="translate(49.38, 0)"><line class="line-vertical " x1="0" x2="0" y1="296" y2="-6" style="stroke: rgb(218, 218, 218);"></line><text x="0" y="300" dy="10px" font-size="10px" text-anchor="middle">One</text></g><g transform="translate(148.13, 0)"><line class="line-vertical " x1="0" x2="0" y1="296" y2="-6" style="stroke: rgb(218, 218, 218);"></line><text x="0" y="300" dy="10px" font-size="10px" text-anchor="middle">Two</text></g><g transform="translate(246.88, 0)"><line class="line-vertical " x1="0" x2="0" y1="296" y2="-6" style="stroke: rgb(218, 218, 218);"></line><text x="0" y="300" dy="10px" font-size="10px" text-anchor="middle">Three</text></g><g transform="translate(345.63, 0)"><line class="line-vertical " x1="0" x2="0" y1="296" y2="-6" style="stroke: rgb(218, 218, 218);"></line><text x="0" y="300" dy="10px" font-size="10px" text-anchor="middle">Four</text></g></g><g class="dataset-units dataset-line dataset-0" transform=""><path class="line-graph-path" d="M49.38,275.5L148.13,261L246.88,174L345.63,246.5" style="stroke: rgb(205, 32, 31); fill: none; stroke-width: 2;"></path><circle style="fill: #cd201f" data-point-index="0" cx="49.38" cy="275.5" r="4"></circle><circle style="fill: #cd201f" data-point-index="1" cx="148.13" cy="261" r="4"></circle><circle style="fill: #cd201f" data-point-index="2" cx="246.88" cy="174" r="4"></circle><circle style="fill: #cd201f" data-point-index="3" cx="345.63" cy="246.5" r="4"></circle></g><g class="dataset-units dataset-line dataset-1" transform=""><path class="line-graph-path" d="M49.38,232L148.13,246.5L246.88,217.5L345.63,275.5" style="stroke: rgb(70, 127, 208); fill: none; stroke-width: 2;"></path><circle style="fill: #467fd0" data-point-index="0" cx="49.38" cy="232" r="4"></circle><circle style="fill: #467fd0" data-point-index="1" cx="148.13" cy="246.5" r="4"></circle><circle style="fill: #467fd0" data-point-index="2" cx="246.88" cy="217.5" r="4"></circle><circle style="fill: #467fd0" data-point-index="3" cx="345.63" cy="275.5" r="4"></circle></g><g class="dataset-units dataset-line dataset-2" transform=""><path class="line-graph-path" d="M49.38,174L148.13,275.5L246.88,232L345.63,246.5" style="stroke: rgb(66, 186, 150); fill: none; stroke-width: 2;"></path><circle style="fill: #42ba96" data-point-index="0" cx="49.38" cy="174" r="4"></circle><circle style="fill: #42ba96" data-point-index="1" cx="148.13" cy="275.5" r="4"></circle><circle style="fill: #42ba96" data-point-index="2" cx="246.88" cy="232" r="4"></circle><circle style="fill: #42ba96" data-point-index="3" cx="345.63" cy="246.5" r="4"></circle></g><g class="dataset-units dataset-line dataset-3" transform=""><path class="line-graph-path" d="M49.38,275.5L148.13,232L246.88,188.5L345.63,130.5" style="stroke: rgb(96, 92, 168); fill: none; stroke-width: 2;"></path><circle style="fill: #605ca8" data-point-index="0" cx="49.38" cy="275.5" r="4"></circle><circle style="fill: #605ca8" data-point-index="1" cx="148.13" cy="232" r="4"></circle><circle style="fill: #605ca8" data-point-index="2" cx="246.88" cy="188.5" r="4"></circle><circle style="fill: #605ca8" data-point-index="3" cx="345.63" cy="130.5" r="4"></circle></g><g class="dataset-units dataset-line dataset-4" transform=""><path class="line-graph-path" d="M49.38,261L148.13,145L246.88,217.5L345.63,246.5" style="stroke: rgb(124, 214, 253); fill: none; stroke-width: 2;"></path><circle style="fill: #7cd6fd" data-point-index="0" cx="49.38" cy="261" r="4"></circle><circle style="fill: #7cd6fd" data-point-index="1" cx="148.13" cy="145" r="4"></circle><circle style="fill: #7cd6fd" data-point-index="2" cx="246.88" cy="217.5" r="4"></circle><circle style="fill: #7cd6fd" data-point-index="3" cx="345.63" cy="246.5" r="4"></circle></g></g><g class="chart-legend" transform="translate(50, 360)"><g transform="translate(0, 0)"><rect class="legend-bar" x="0" y="0" width="100" height="2px" fill="#cd201f"></rect><text class="legend-dataset-text" x="0" y="0" dy="20px" font-size="12px" text-anchor="start" fill="#555b51">Red</text></g><g transform="translate(100, 0)"><rect class="legend-bar" x="0" y="0" width="100" height="2px" fill="#467fd0"></rect><text class="legend-dataset-text" x="0" y="0" dy="20px" font-size="12px" text-anchor="start" fill="#555b51">Blue</text></g><g transform="translate(200, 0)"><rect class="legend-bar" x="0" y="0" width="100" height="2px" fill="#42ba96"></rect><text class="legend-dataset-text" x="0" y="0" dy="20px" font-size="12px" text-anchor="start" fill="#555b51">Yellow</text></g><g transform="translate(300, 0)"><rect class="legend-bar" x="0" y="0" width="100" height="2px" fill="#605ca8"></rect><text class="legend-dataset-text" x="0" y="0" dy="20px" font-size="12px" text-anchor="start" fill="#555b51">Green</text></g><g transform="translate(400, 0)"><rect class="legend-bar" x="0" y="0" width="100" height="2px" fill="#7cd6fd"></rect><text class="legend-dataset-text" x="0" y="0" dy="20px" font-size="12px" text-anchor="start" fill="#555b51">Purple</text></g></g></svg></div></div>
            <div id="zlowfxjpskeghcndtqmrbyvia_loader" style="display: none; justify-content: center; opacity: 1; align-items: center; height: 400px;">
            <svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                        <stop stop-color="#22292F" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#22292F" stop-opacity=".631" offset="63.146%"></stop>
                        <stop stop-color="#22292F" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)">
                        <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <circle fill="#22292F" cx="36" cy="18" r="1">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                        </circle>
                    </g>
                </g>
            </svg>
            </div>

            </div>

            </div>
            </div>
            </div>

                
            </div>


            
                </div>

    </main> --}}
@endsection