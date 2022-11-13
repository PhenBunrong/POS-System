
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow"> 
    <meta name="csrf-token" content="RbBUf1RxtgWruzYXcpmGe4Xi3Qu3arkLfpF3aVxf" /> 
    <title>Backpack Admin Panel</title>

            
                <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/packages/backpack/base/css/bundle.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
                <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/build/css/intlTelInput.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
                <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/packages/source-sans-pro/source-sans-pro.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
                <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/packages/line-awesome/css/line-awesome.min.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
                <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/dist/css/lightbox.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
            
                <link rel="stylesheet" href="{{ asset('contents/website') }}/css/font-awesome.min.css" />
                <!-- Theme main style -->
                <link rel="stylesheet" href="{{ asset('contents/website') }}/style.css" />
        
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="app aside-menu-fixed sidebar-lg-show">

  <header class="app-header navbar navbar-color bg-primary border-0">
    <!-- Logo -->
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto ml-3" type="button" data-toggle="sidebar-show" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="http://127.0.0.1:8000" title="Backpack Admin Panel">
        <b>Back</b>pack
    </a>

    <ul class="nav navbar-nav ml-auto ">
        <li class="nav-item dropdown pr-0">
            <a data-toggle="dropdown" href="locale/en" role="button" aria-haspopup="true" aria-expanded="false" class="nav-link">
                <img src="https://cicstaging.z1central.com/images/flag/english.png" style="width: 25px;">
            </a> 
            <div class="dropdown-menu dropdown-menu-right mr-4 pb-1 pt-1">
                <a href="locale/en" class="dropdown-item">
                    <img src="https://cicstaging.z1central.com/images/flag/english.png" class="mr-2" style="width: 25px;"> អង់គ្លេស
                </a> 
                <div class="dropdown-divider m-0"></div> 
                <a href="locale/kh" class="dropdown-item">
                    <img src="https://cicstaging.z1central.com/images/flag/khmer.png" class="mr-2" style="width: 25px;"> ខ្មែរ
                </a>
            </div>
        </li>

        <li class="nav-item dropdown pr-4">
            <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" class="nav-link text-light">
                <img src="{{ backpack_avatar_url(backpack_auth()->user()) }}" alt="{{ backpack_auth()->user()->name }}" class="img-avatar"> 
                    <span>{{backpack_user()->getAttribute('name') ? mb_substr(backpack_user()->name, 0, 4, 'UTF-8') : 'A'}}</span> 
                    <em class="la la-caret-down"></em>
            </a> 
            <div class="dropdown-menu dropdown-menu-right mr-4 pb-1 pt-1">
              <a class="dropdown-item" href="{{ route('backpack.account.info') }}"><i class="la la-user"></i> {{ trans('backpack::base.my_account') }}</a>
            <div class="dropdown-divider"></div> 
                <a class="dropdown-item" href="{{ backpack_url('logout') }}"><i class="la la-lock"></i> {{ trans('backpack::base.logout') }}</a>
            </div>
          </li>   
    </ul>
<!-- ========== End of top menu right items ========== -->
</header>

  <div class="card-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-2">
                                    <h3 class="text-uppercase">Pos</h3>
                                </div>
                                <div class="col-md-4">
                                    <input  type="text" placeholder="search by name, code, price, discount rate" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                @foreach ($collection as $item)
                                    <div class="col-md-4 mb-4">
                                        <div class="product-wrapper bl">
                                            <div class="product-img">
                                                <div class="discount_amount">
                                                    <span>{{$item->discount}} %</span>
                                                </div>
                                                <a href="#">
                                                    <img src="/dummy_products/4.jpg" alt="" class="primary">
                                                    <img src="/dummy_products/1.jpg" alt="" class="secondary">
                                                </a>
                                                <div class="product-icon c-fff home3-hover-bg">
                                                    <ul>
                                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Add to cart"><i class="fa fa-shopping-cart"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-comments"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip"  title="" data-original-title="view product details"><i class="fa fa-search"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content home3-hover">
                                                <h3><a>{{$item->name}}</a></h3>
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                            
                                                <div class="d-flex justify-content-between">
                                                    <span>
                                                        <del>$ {{$item->price}}</del>
                                                    </span>
                                                    <button class="btn btn-dark btn-sm mt-4" type="button" >add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>product</th>
                                                <th class="text-center">qty</th>
                                                <th class="text-right">price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <div class="d-flex">
                                                        <img :src="" style="height: 40px;padding-right: 5px;" alt="">
                                                        
                                                    </div>
                                                </th>
                                                <td style="width: 145px;">
                                                    <div class="qty text-center">
                                                        <input type="number"  min="1" style="width: 50px">

                                                        <i class="fa fa-recycle btn-sm btn-warning"></i>
                                                        <i class="fa fa-trash btn-sm btn-danger"></i>
                                                    </div>
                                                </td>
                                                <td style="width: 80px;" class="text-right"><h6>$</h6></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-right">Total</th>
                                                <th class="text-right"><h6>$ </h6></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div><!-- ./app-body -->

  <footer class="app-footer d-print-none">
    <div class="text-muted ml-auto mr-auto">
            Handcrafted by <a target="_blank" rel="noopener" href="http://tabacitu.ro">Cristian Tabacitu</a>.
                  Powered by <a target="_blank" rel="noopener" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>.
          </div>
  </footer>

  <script type="text/javascript" src="http://127.0.0.1:8000/packages/backpack/base/js/bundle.js?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/dist/js/lightbox.js?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/build/js/intlTelInput.js?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa"></script>
</body>
</html>
